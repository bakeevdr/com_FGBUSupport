<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
//jimport('joomla.application.component.controller');
class FgbusupportController extends JControllerLegacy
{
	function display($cachable = false, $urlparams = false) {
		JRequest::setVar('view', JRequest::getCmd('view', 'control'));
		FgbusupportHelper::addSubmenu();
		parent::display($cachable, $urlparams);
	}
}