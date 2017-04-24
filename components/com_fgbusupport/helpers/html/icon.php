<?php
defined('_JEXEC') or die;

abstract class JHtmlIcon
{
	public static function create()
	{
		$user      = JFactory::getUser();
		$canCreate  = $user->authorise('core.create', 'com_fgbusupport');
		$params = JComponentHelper::getParams('com_fgbusupport' );
		$output = '';
		if ($canCreate && $params->get('EnableRequest')){
			$url ='index.php?option=com_fgbusupport&task=issue.add';
			$Text  = '<span class="icon-plus"></span> Подать обращение';
			$output .= JHtml::_('link', JRoute::_($url), $Text, 'class="btn btn-primary"');
		}
		return $output;
	}

}
