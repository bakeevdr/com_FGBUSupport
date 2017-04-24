<?php
defined('_JEXEC') or die;
abstract class FgbusupportHelper
{
	public static function addSubmenu() 
	{	
		$document = JFactory::getDocument();
		$document->addStyleDeclaration(".icon-48-fgbusupport {background-image: url('../media/fgbusupport/images/header-logo-flag.gif');}");   //иконка
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$db->setQuery("SELECT *
				FROM #__menu
				WHERE
					link LIKE 'index.php?option=com_fgbusupport%'
					AND parent_id != 1
					AND menutype = 'main'
				ORDER BY id");
				
		$current_view = JRequest::getCmd('view', 'control');
		
		foreach($views = $db->loadObjectList() as $item):
			$view = substr($item -> link,strpos($item -> link,'view=')+5);
			JHtmlSidebar::addEntry(
				JText::_($item -> title),
				$item -> link,
				$view == $current_view
			);
		endforeach;
	}
}