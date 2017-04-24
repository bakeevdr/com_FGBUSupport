<?php
defined('_JEXEC') or die ('Restricted access'); 

class FgbusupportControllerAnswer extends JControllerLegacy
{
	function __construct($default = array()) {
		parent::__construct($default);
		$this->registerTask('clarified','clarified');
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
			JError::raiseWarning( 0, $Answer->error /*.' - '.var_export($Post, true)/**/);
		$this->setRedirect('index.php?option=com_fgbusupport&view=answer&id='.$pk);
	}
}