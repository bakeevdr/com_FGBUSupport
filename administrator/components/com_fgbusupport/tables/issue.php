<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class FgbusupportTableIssue extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__fgbusupport_issue', 'id', $db);
	}
	
	/*public function store($updateNulls = false)
	{
		
		return parent::store($updateNulls);
	}/**/
	
}