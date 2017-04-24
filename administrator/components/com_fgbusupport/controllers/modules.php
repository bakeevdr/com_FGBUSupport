<?php
defined('_JEXEC') or die;

class FgbusupportControllerModules extends JControllerAdmin
{

	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	public function getModel($name = 'Module', $prefix = 'FgbusupportModel')
	{
		return parent::getModel($name, $prefix, $config);
	}
	
	public function publish()
	{
		JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));
		$cid = JFactory::getApplication()->input->get('cid', array(), 'array');
		$data = array('publish' => 1, 'unpublish' => 0);
		$task = $this->getTask();
		$value = JArrayHelper::getValue($data, $task, 0, 'int');
		if (empty($cid)){
			JLog::add(JText::_($this->text_prefix . '_NO_ITEM_SELECTED'), JLog::WARNING, 'jerror');
		}
		else {
			$model = $this->getModel();
			JArrayHelper::toInteger($cid);
			try {
				$model->publish($cid, $value);
				$errors = $model->getErrors();
				if ($value == 1) {
					if ($errors) {
						$app = JFactory::getApplication();
						$app->enqueueMessage(JText::plural($this->text_prefix . '_N_ITEMS_FAILED_ENABLED', count($cid)), 'error');
					}
					else {
						$ntext = $this->text_prefix . '_N_ITEMS_ENABLED';
					}
				}
				elseif ($value == 0){
					$ntext = $this->text_prefix . '_N_ITEMS_DISABLED';
				}
				$this->setMessage(JText::plural($ntext, count($cid)));
			}
			catch (Exception $e){
				$this->setMessage($e->getMessage(), 'error');
			}
		}
		$extension = $this->input->get('extension');
		$extensionURL = ($extension) ? '&extension=' . $extension : '';
		$this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list . $extensionURL, false));
	}

}
