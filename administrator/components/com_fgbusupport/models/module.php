<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelModule extends JModelAdmin
{
	public function getTable($type = 'module', $prefix = 'FgbusupportTable', $config = array()){
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true){
		$form = $this->loadForm('', 'module', array('control' => 'jform', 'load_data' => $loadData));
		if (empty( $form )) {
			return false;
		}
		return $form;
	}
	
		protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_fgbu.edit.module.data', array());
		if (empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}
	
	public function publish(&$pks, $value=1){
		$Answer = FgbusupportHelperQuery::getsupport(array(), 'get_software','GET');
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		foreach ($pks as $pks_k => $pks_v) {
			if ($pks_v<0) {
				foreach ($Answer->module as $Answer_V) {
					if ($Answer_V->modul_id== abs($pks_v)) {
						$query->clear()
							->insert($db->quoteName('#__fgbusupport_module'))
							->columns($db->quoteName('supp_modul_id') . ',' . $db->quoteName('supp_modul_name'). ',' . $db->quoteName('supp_version_name'). ',' . $db->quoteName('changed_name'))
							->values( $db->quote($Answer_V->modul_id).', '.$db->quote($Answer_V->modul_name).', '.$db->quote('').', '.$db->quote($Answer_V->modul_name));
						$db->setQuery($query);
						try{
							$db->execute();
						}
						catch (RuntimeException $e){
							$this->setError($e->getMessage());
							return false;
						}
						$pks[$pks_k] = $db->insertid();
					}
				}
			}
		}
		return parent::publish($pks, $value);
	}
	
}