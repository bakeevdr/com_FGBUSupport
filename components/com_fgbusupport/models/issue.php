<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelIssue extends JModelAdmin
{
	public function getTable($type = 'issue', $prefix = 'FgbusupportTable', $config = array()){
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true){
		$form = $this->loadForm('com_fgbusupport.issue', 'issue', array('control' => 'jform', 'load_data' => $loadData));
		if (empty( $form )) {
			return false;
		}
		return $form;
	}/**/
	
	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_fgbusupport.edit.issue.data', array());
		if (empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}
	
	public function save( $data ){
		$user		= JFactory::getUser();
		$userProfile  = JUserHelper::getProfile();
		$SendData = array(	
						'caption'	=> $data['caption'],  
						'topic'		=> $data['topic'],
						'module_id'	=> $data['module'],
						'surname'=>$user->f,
						'name'=>$user->i,
						'middle_name'=>$user->o,
						'phone'=>$userProfile->profile['phone'],
						'email'=>$user->email,
		);
		$Answer = FgbusupportHelperQuery::getsupport($SendData, 'issue_create');
		If (!empty($Answer->error)) {
			$MSG =$Answer->error.'<br>';
			foreach($Answer->message as $MSG_t){
				$MSG .= $MSG_t.'<br>';
			}/**/
			$this->setError($MSG);
		}
		If (!empty($Answer->success)) {
			$data['user_id']			= $user->id;
			$data['supp_num']			= $Answer->number;
			$data['supp_id']			= $Answer->id;
			$data['supp_date_create']	= $Answer->date_create;
			$data['supp_status_id']		= $Answer->status_id;
			$data['supp_module_id']		= $data['module'];
			$return		= parent::save( $data );
		}/**/
		return $return;
	}
	
}