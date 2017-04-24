<?php
	defined( '_JEXEC' ) or die( 'Restricted access' );
	if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
	$params = JComponentHelper::getParams('com_fgbusupport' );
	if (!($params->get('SupportProtocol') && $params->get('SupportURL') && $params->get('SupportID')))
		return JError::raiseWarning(0, 'Система не настроена обратитесь к администратору');
	
	if (!JFactory::getUser()->authorise('core.manage', 'com_fgbusupport')) {
		return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	}
	JLoader::register('FgbusupportHelperQuery', JPATH_COMPONENT_ADMINISTRATOR .DS.'helpers'.DS.'query.php');
	JLoader::register('FgbusupportHelper', 		JPATH_COMPONENT_ADMINISTRATOR .DS.'helpers'.DS.'helper.php');
	jimport('joomla.application.component.controller');
	$controller = JControllerLegacy::getInstance('fgbusupport');
	$controller->execute( JRequest::getCmd('task'));
	$controller->redirect();