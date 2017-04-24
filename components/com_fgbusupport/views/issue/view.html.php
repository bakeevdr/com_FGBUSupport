<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.view');

class FgbusupportViewIssue extends JViewLegacy
{
	public function display($tpl = null)
	{
		$this->user				= JFactory::getUser();
		$this->form 			= $this->get('Form');
		$this->item 			= $this->get('Item');
		
		parent::display($tpl);
	}
}