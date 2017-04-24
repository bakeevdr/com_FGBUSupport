<?php
defined('_JEXEC') or die('Restricted access');

class FgbusupportModelAnswer extends JModelItem
{
	
	protected function preprocessForm(JForm $form, $data, $group = 'content')
	{
		JPluginHelper::importPlugin($group);
		$dispatcher = JEventDispatcher::getInstance();
		$results = $dispatcher->trigger('onContentPrepareForm', array($form, $data));
		if (count($results) && in_array(false, $results, true)) {
			$error = $dispatcher->getError();
			if (!($error instanceof Exception)) {
				throw new Exception($error);
			}
		}
	}
	
	protected function loadFormData()
	{
		return array();
	}
	
	protected function loadForm($name, $source = null, $options = array(), $clear = false, $xpath = false)
	{
		$options['control'] = JArrayHelper::getValue($options, 'control', false);
		$hash = md5($source . serialize($options));
		if (isset($this->_forms[$hash]) && !$clear) {
			return $this->_forms[$hash];
		}
		JForm::addFormPath(JPATH_COMPONENT . '/models/forms');
		JForm::addFieldPath(JPATH_COMPONENT . '/models/fields');
		JForm::addFormPath(JPATH_COMPONENT . '/model/form');
		JForm::addFieldPath(JPATH_COMPONENT . '/model/field');

		try {
			$form = JForm::getInstance($name, $source, $options, false, $xpath);

			if (isset($options['load_data']) && $options['load_data']) {
				$data = $this->loadFormData();
			}
			else {
				$data = array();
			}
			$this->preprocessForm($form, $data);
			$form->bind($data);
		}
		catch (Exception $e) {
			$this->setError($e->getMessage());
			return false;
		}
		$this->_forms[$hash] = $form;
		return $form;
	}
	
	public function getForm($data = array(), $loadData = true){
		$form = $this->loadForm('com_fgbusupport.answer', 'answer', array('control' => 'jform', 'load_data' => $loadData));
		if (empty( $form )) {
			return false;
		}
		return $form;
	}/**/
	
	protected function populateState()
	{
		$app = JFactory::getApplication('site');
		$pk = $app->input->getInt('id');
		$this->setState('issue.id', $pk);
	}
	
	public function getItem($pk = null)
	{
		$user		= JFactory::getUser();
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('issue.id');

		if ($this->_item === null){
			$this->_item = array();
		}
		if (!isset($this->_item[$pk])){
			try{
				$db 		= JFactory::getDBO();
				$query 		= $db->getQuery(true);
				$query->select("issue.*")
					->from('#__fgbusupport_issue as issue ');
				$query
					->where($db->quoteName('issue.user_id') . ' = ' . (int) $user->id)
					->where('issue.id = ' . (int) $pk);
				
				$db->setQuery($query);
				$data = $db->loadObject();
				if (!empty($data)){
					$data-> support = FgbusupportHelperQuery::getsupport(array('number_issue' => $data->supp_num), 'issue_info','GET');
				}
				$this->_item[$pk] = $data;
			}
			catch (Exception $e){
				if ($e->getCode() == 404){
					JError::raiseError(404, $e->getMessage());
				}
				else{
					$this->setError($e);
					$this->_item[$pk] = false;
				}
			}
		}
		return $this->_item[$pk];
	}
}