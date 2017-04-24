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
				'status',	'module', 'user',
				
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
		$orderCol	= $this->state->get('list.ordering','id');
		$orderDirn	= $this->state->get('list.direction');
		$query->order($db->Escape($orderCol.' '.$orderDirn));/**/
		
		//---- Фильтр / Статус рассмотрения
		$filter_status = $this->getState('filter.status');

		if (!empty($filter_status)){
			if ($filter_status != -1)
				$query->where($db->quoteName('issue.supp_status_id') . " = '" .$filter_status."'");
		}
		else
			$query->where($db->quoteName('issue.supp_status_id') . " not in ('issue_closed')");
		
		//---- Фильтр / Модуль
		$filter_module = $this->getState('filter.module');
		if (!empty($filter_module))
			$query->where($db->quoteName('issue.supp_module_id') . " = '" .$filter_module."'");/**/
		
		//---- Фильтр / Пользователь
		$filter_user = $this->getState('filter.user');
		if (!empty($filter_user))
			$query->where($db->quoteName('issue.user_id') . " = " .$filter_user);/**/
		
		//---- Фильтр / Поиск
		$search = $this->getState('filter.search');
		if (!empty($search)) {
			$search = $db->Quote('%'.$db->Escape($search, true).'%');
			$query->where('( upper(issue.caption) like upper('.$search.'))');
		}/**/
		return $query;
	}/**/
	
	/*protected function getStoreId($id = '')
	{
		$id.= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.status');
		$id .= ':' . $this->getState('filter.user');
		$id .= ':' . $this->getState('filter.module');
		return parent::getStoreId($id);
	}/**/
	
	/*protected function populateState($ordering = 'issue.id', $direction = 'asc')
	{
		//---- Фильтры
		$this->setState('filter.search',	$this->getUserStateFromRequest($this->context . '.filter.search',	'filter_search'));
		$this->setState('filter.status',	$this->getUserStateFromRequest($this->context . '.filter.status',	'filter_status'));
		$this->setState('filter.user',		$this->getUserStateFromRequest($this->context . '.filter.user',		'filter_user'));
		$this->setState('filter.module',	$this->getUserStateFromRequest($this->context . '.filter.module',	'filter_module'));
		parent::populateState($ordering, $direction);
	}/**/
}