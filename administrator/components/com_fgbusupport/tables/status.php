<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.database.table');
class FgbusupportTableStatus extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__fgbusupport_status', 'id', $db);
	}
	
	/*public function store($updateNulls = false)
	{
		
		return parent::store($updateNulls);
	}/**/
	
}