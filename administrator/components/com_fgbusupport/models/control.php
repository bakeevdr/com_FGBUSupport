<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelControl extends JModelList
{
	protected function getListQuery()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__menu ')
			->where("link LIKE 'index.php?option=com_fgbusupport%'")
			->where("parent_id != 1")
			->where("menutype = 'main'");
		return $query;
	}
}