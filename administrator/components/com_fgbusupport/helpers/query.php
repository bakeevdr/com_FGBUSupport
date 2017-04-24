<?php
		/*$app					=	JFactory::getApplication();
		$params					=	$app->getParams();/**/
defined('_JEXEC') or die;
class FgbusupportHelperQuery
{
	public static function preparefiles(){
		$input = JFactory::getApplication()->input;
		$files = $input->files->get('jform', array(), 'array');
		$i = 0;
		$issue_files = array();
		foreach($files as $file){
			if ($file['error']==UPLOAD_ERR_OK) {
				$NewFileName = sys_get_temp_dir().'/'.$file['name'];
				file_put_contents($NewFileName, file_get_contents($file['tmp_name']));
				$issue_files['issue_file_id'.++$i] = '@'.realpath($NewFileName);
			}
		}
		return $issue_files;
	}/**/
	
	public static function getsupport($SendData,$Page,$Method='POST')
	{
		$params = JComponentHelper::getParams('com_fgbusupport' );
		$URL					=	$params->get('SupportProtocol').'://'.$params->get('SupportURL').'/api_portal/'.$Page;
		$SendData['source']		=	$params->get('SupportID');
		$SendFile = FgbusupportHelperQuery::preparefiles();
		if (function_exists('curl_init')){
			$curl = curl_init();
			if ($Method=='POST') {
				curl_setopt($curl, CURLOPT_URL, $URL);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS,array_merge($SendData,$SendFile)); 
			} else {
				curl_setopt($curl, CURLOPT_URL, $URL.'?'.preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D',http_build_query($SendData)));
			}
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			if ($Page == 'download')
				$Answer = curl_exec($curl);
			else 
				$Answer = json_decode(curl_exec($curl));
		}
		else{
			/*$opts = array(
				'http' =>array(
					'method'  => $Method,
					//'header'  => 'Content-type: application/x-www-form-urlencoded',
					'header'  => 'Content-type: multipart/form-data',
					'content' => preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D',http_build_query($SendData)).'&issue_file_id1=@/var/www/1index.html', //'.http_build_query($SendFile),
				),
			);
			$Answer = json_decode(file_get_contents($URL, false, stream_context_create($opts)));/**/
		}
		
		if (in_array($_SERVER['REMOTE_ADDR'],array('10.2.142.222', ))) {
			JError::raiseNotice(0,	'<pre>'.var_export($URL, true).'</pre>'.
									'<pre>'.var_export(array_merge($SendData,$SendFile), true).'</pre>'.
									'<pre>'.var_export($Answer, true).'</pre>'
								);
		}/**/
		return $Answer;
	}/**/
	
	/*public static function download($SendData,$Page,$Method='POST')
	{
		$params = JComponentHelper::getParams('com_fgbusupport' );
		$URL					=	$params->get('SupportProtocol').'://'.$params->get('SupportURL').'/api_portal/'.$Page;
		$SendData['source']		=	$params->get('SupportID');
		
		$path = '/var/www/tmp/a-large-file.zip';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $URL.'?'.preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D',http_build_query($SendData)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$data = curl_exec($ch);
		JError::raiseNotice(0,	'<pre>'.var_export($data, true).'</pre>');
		
		curl_close($ch);
		file_put_contents($path, $data);
	}/**/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
