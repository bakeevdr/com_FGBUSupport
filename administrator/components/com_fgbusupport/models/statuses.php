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
		$query->select('status.*')
			->from('#__fgbusupport_status as status ');
			
		
		return $query;
	}/**/
}