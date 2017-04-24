<?php

defined('_JEXEC') or die;
class FgbusupportHelperQuery
{
	public static function getsupport($SendData,$Page,$Method='POST')
	{
		/*$app					=	JFactory::getApplication();
		$params					=	$app->getParams();/**/
		$params = JComponentHelper::getParams('com_fgbusupport' );
		$URL					=	$params->get('SupportProtocol').'://'.$params->get('SupportURL').'/api_portal/'.$Page;
		$SendData['source']		=	$params->get('SupportID');
		$opts = array(
			'http' =>array(
				'method'  => $Method,
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D',http_build_query($SendData)),
			),
		);
		$Answer = json_decode(file_get_contents($URL, false, stream_context_create($opts)));
		
		return $Answer;
	}
}
