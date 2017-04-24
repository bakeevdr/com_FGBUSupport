<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.modellist');

class FgbusupportModelIssues extends JModelList{

	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id',				'issue.id',
				'caption',			'issue.caption',
				'supp_id',			'issue.supp_id',
				'supp_num',			'issue.supp_num',
				'supp_date_create',	'issue.supp_date_create',
				'supp_date_end',	'issue.supp_date_end',
				'supp_status',		'status.name',
				'user_name',		'users.name',
				
			);
		}
		parent::__construct($config);
	}
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('issue.*')
			->from('#__fgbusupport_issue as issue ');
		$query	->select('status.name as supp_status')
				->select('status.color as supp_status_color')
				->leftJoin('#__fgbusupport_status AS status ON status.code = issue.supp_status_id');
		$query	->select('users.name as user_name')
				->select('users.email as user_email')
				->leftJoin('#__users AS users ON users.id = issue.user_id');

		//---- Сортировка
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		$query->order($db->Escape($orderCol.' '.$orderDirn));/**/
		
		//---- Фильтр / поиск
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			if (stripos($search, 'id:') === 0) {
				$query->where('id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->Escape($search, true).'%');
				$query->where('( issue.caption like '.$search.')');
			}
		}/**/
		return $query;
	}/**/
	
	protected function populateState($ordering = null, $direction = null)
	{
		//---- Фильтр / поиск
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);
		parent::populateState('id', 'asc');
		
	}/**/
	
	protected function getStoreId($id = '')
	{
		$id.= ':' . $this->getState('filter.search');
		return parent::getStoreId($id);
	}/**/

}