<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.modellist');

class FgbusupportModelStatuses extends JModelList{

	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query
			->select('status.id')
			->select('status.code')
			->select('status.name')
			->select('status.color')
			->from('#__fgbusupport_status status');
		
		$query
			->select('Count(issue.id) countissue')
			->leftJoin('#__fgbusupport_issue issue on issue.supp_status_id = status.code')
			->group('status.name ,status.id ,status.color ,status.code');
		$query
			->order('id','desc');
		return $query;
	}/**/
}