<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FgbusupportViewInfo extends JViewLegacy
{
	
	function display($tpl = null)
	{

		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_FGBUSUPPORT').': '.JText::_('COM_FGBUSUPPORT_INFO'), 'fgbusupport');
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton('Custom', '<a class="btn btn-small" href="index.php?option=com_fgbusupport"><span class="icon-tools"> </span>Панель управления</a>');
		if (JFactory::getUser()->authorise('core.admin', 'com_fgbusupport'))
		{
			JToolBarHelper::preferences('com_fgbusupport');
		}
	}
}