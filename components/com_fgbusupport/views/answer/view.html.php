<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class FgbusupportViewAnswer extends JViewLegacy
{
	protected $pagination;
	
	function display($tpl = null)
	{
		$this->item 			= $this->get('Item');
		$this->form 			= $this->get('Form');
		
		parent::display($tpl);
	}
}