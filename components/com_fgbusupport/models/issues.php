<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelIssues extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])){
			$config['filter_fields'] = array(
				'id',			'issues.id',
				'caption',		'issues.caption',
				'supp_num',		'issues.supp_num',
			);
		}
		parent::__construct($config);
	}
	
	public function getItems()
	{
		$items		= parent::getItems();
		$db 		= JFactory::getDBO();
		$supp_ID = array();
		if (is_array($items)) {
			foreach ($items as $items_K => $item)
				$supp_ID["mas_issue_id"][] = $item->supp_id;
		}
		if (!Empty($supp_ID["mas_issue_id"])){
			$Answer = FgbusupportHelperQuery::getsupport($supp_ID, 'issue_info_list','GET');
			if (!empty($Answer) && (is_array($items))){
				foreach ($items as $item) {
					foreach ($Answer as $Answer_V)
						if (empty($Answer_V -> error)){
							if ($item -> supp_id == $Answer_V -> id) {
								if ($item -> supp_status_id !== $Answer_V -> status_id) {
									$item -> supp_status = $Answer_V -> status;
									$item -> supp_date_end = $Answer_V -> date_end;
									$db->setQuery("Update #__fgbusupport_issue set supp_status_id ='".$Answer_V -> status_id."', supp_module_id ='".$Answer_V -> module_id."', supp_date_end='".$Answer_V -> date_end."' where id = ".$item -> id);
									$db->execute();
								}
								break;
							}
						}
				}
			}
		}
		return $items;
	}
	
	protected function getListQuery()
	{
		$user		= JFactory::getUser();
		$db 		= JFactory::getDBO();
		$query 		= $db->getQuery(true);
		$query->select("issue.*")
			->from('#__fgbusupport_issue as issue ');
			
		$query->where($db->quoteName('issue.user_id') . ' = ' . (int) $user->id);
		
		$query	->select('status.name as supp_status')
				->select('status.color as supp_status_color')
				->leftJoin('#__fgbusupport_status AS status ON status.code = issue.supp_status_id');
			
		//---- Сортировка 
		$orderCol	= $this->state->get('list.ordering','id');
		$orderDirn	= $this->state->get('list.direction', 'desc');
		$query->order($db->Escape($orderCol.' '.$orderDirn));
		
		//---- Поиск
		$search = trim($this->getState('filter.search'));
		if (!empty($search)){
			$search = explode(' ',$search);
			foreach ($search as $search_v ) {
				$search_v = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search_v), true) . '%'));
				$query->where('((LOWER(issue.caption) LIKE LOWER(' . $search_v . ')) or (LOWER(issue.topic) LIKE LOWER(' . $search_v . ')))');
			};
		};
		return $query;
	}/**/
}