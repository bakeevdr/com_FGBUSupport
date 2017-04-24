<?php
defined('_JEXEC') or die ('Restricted access'); 

class FgbusupportControllerAnswer extends JControllerLegacy
{
	function __construct($default = array()) {
		parent::__construct($default);
		$this->registerTask('clarified','clarified');
		$this->registerTask('download','download');
	}
	
	function clarified() {
		$user		= JFactory::getUser();
		$appSite = JFactory::getApplication('site');
		$pk = $appSite->input->getInt('id');
		$jform  = $appSite->input->post->get('jform', array(), 'array');
		$db 		= JFactory::getDBO();
		$query 		= $db->getQuery(true);
		$query->select("issue.*")
			->from('#__fgbusupport_issue as issue ');
		$query
			->where($db->quoteName('issue.user_id') . ' = ' . (int) $user->id)
			->where('issue.id = ' . (int) $pk);
		
		$db->setQuery($query);
		$data = $db->loadObject();

		$Answer = FgbusupportHelperQuery::getsupport(array(	'message'	=> $jform['message'], 'issue_id'	=> $data->supp_id), 'issue_clarified');
		
		if (!empty($Answer->error))
			JError::raiseWarning( 0, $Answer->error);
		$this->setRedirect('index.php?option=com_fgbusupport&view=answer&id='.$pk);
	}
	
	function download() {
		$appSite = JFactory::getApplication('site');
		$ID =  explode ("||||",utf8_decode(urldecode (base64_decode(urldecode ($appSite->input->getvar('id'))))));
		$issue_id = $ID[0];
		$issue_file = $ID[1];
		$filename = $ID[2];
		$Answer = FgbusupportHelperQuery::getsupport(array(	'link'	=> $issue_file, 'issue_id'	=> $issue_id), 'download','GET');
		if (!empty($Answer)) {
			header ('Content-Description: File Transfer');
			header ("Content-Type: application/octet-stream");
			header ("Content-Disposition: attachment; filename=".$filename);
			header ('Content-Transfer-Encoding: binary');
			header ('Expires: 0');
			header ('Cache-Control: must-revalidate');
			header ('Pragma: public');
			header ('Content-Length: ' . strlen($Answer));
			Echo $Answer;
			Exit;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}