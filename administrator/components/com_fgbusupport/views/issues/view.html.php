<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FgbusupportViewIssues extends JViewLegacy
{
	
	function display($tpl = null)
	{
		$this->items 			= $items = $this->get('Items');
		$this->pagination 		= $this->get('Pagination');
		$this->state 			= $this->get('State');
		$this->filterForm		= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');
		
		$params = JComponentHelper::getParams('com_fgbusupport' );
		$this -> URL			=	$params->get('SupportProtocol').'://'.$params->get('SupportURL');
		

		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		/**/
		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_FGBUSUPPORT').': '.JText::_('COM_FGBUSUPPORT_ISSUES'), 'fgbusupport');
		$bar = JToolBar::getInstance('toolbar');
		$bar->appendButton('Custom', '<a class="btn btn-small" href="index.php?option=com_fgbusupport"><span class="icon-tools"> </span>Панель управления</a>');
		
	}
}