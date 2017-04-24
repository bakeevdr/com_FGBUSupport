<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FgbusupportViewIssues extends JViewLegacy
{
	protected $pagination;
	
	function display($tpl = null)
	{
		$app					= JFactory::getApplication();
		$this->user    			= JFactory::getUser();
		$this->state			= $this->get('State');
		$this->items 			= $this->get('Items');
		$this->pagination		= $this->get('Pagination');
		$this->filterForm		= $this->get('FilterForm');
		$this->activeFilters	= $this->get('ActiveFilters');
		parent::display($tpl);
	}
	
}