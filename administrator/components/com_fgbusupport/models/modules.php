<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelModules extends JModelList{

	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	
	private function getVersion($Items, $ID)
	{
		foreach($Items as $items_V){
			if ($items_V->version_id==$ID) {
				return $items_V->version_id.' - '.$items_V->version_name;
			}
		}
	}

	public function getItems()
	{
		if (!($items		= parent::getItems()))
			$items=array();
		$Answer = FgbusupportHelperQuery::getsupport(array(), 'get_software','GET');
		$items_New = array();
		if (!empty($Answer) && (is_array($items))){
			foreach($Answer->module as $Answer_K => $Answer_V){
				$NewModul = true;
				foreach($items as $items_K => $items_V){
					if ($items_V->supp_modul_id==$Answer_V->modul_id) {
						$NewModul = false;
						$items[$items_K] -> supp_version = $this->getVersion($Answer->version, $Answer_V->version_id);
					}
				}
				if ($NewModul) {
					$items_New[] = (object) array (
						'id'			=> -$Answer_V -> modul_id,
						'supp_modul_id'		=> $Answer_V -> modul_id,
						'supp_modul_name'	=> $Answer_V -> modul_name,
						'supp_version'		=> '',
						'changed_name'		=> '',
					);
				}
			}
		}
		return array_merge($items_New, $items);
	}
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('module.*')
			->from('#__fgbusupport_module as module ');
		$query->order($db->Escape('id asc '));
		return $query;
	}/**/
	
}