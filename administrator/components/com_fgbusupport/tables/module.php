<?php
defined('_JEXEC') or die('Restricted access');
class FgbusupportTableModule extends JTable
{
	function __construct(&$db) 
	{
		parent::__construct('#__fgbusupport_module', 'id', $db);
	}
	
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		$k = $this->_tbl_key;
		JArrayHelper::toInteger($pks);
		$state  = (int) $state;
		if (empty($pks)){
			if ($this->$k){
				$pks = array($this->$k);
			}
			else{
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}
		$where = $k . ' IN (' . implode(',', $pks) . ')';
		$this->_db->setQuery(
			'UPDATE ' . $this->_db->quoteName($this->_tbl)
			. ' SET ' . $this->_db->quoteName('state') . ' = ' . (int) $state
			. ' WHERE (' . $where . ')'
		);
		try{
			$this->_db->execute();
		}
		catch (RuntimeException $e){
			$this->setError($e->getMessage());
			return false;
		}
		if (in_array($this->$k, $pks)){
			$this->state = $state;
		}
		$this->setError('');
		return true;
	}
	
}