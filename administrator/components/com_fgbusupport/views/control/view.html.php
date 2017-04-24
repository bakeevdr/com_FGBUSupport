<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportViewControl extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->items	= $this->get('items');
		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
		
	}
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('com_fgbusupport').': Панель управления', 'fgbusupport');
		if (JFactory::getUser()->authorise('core.admin', 'com_fgbusupport'))
		{
			JToolBarHelper::preferences('com_fgbusupport');
		}
	}
}