<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.calendar');
?>
<script type="text/javascript">
  Joomla.submitbutton = function(task)
	{
		if (task == 'Issue.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			Joomla.submitform(task, document.getElementById('adminForm'));
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_fgbusupport&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm"  class="form-validate">
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('Issue.save')">
				<span class="icon-ok"></span><?php echo JText::_('JSAVE') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('Issue.cancel')">
				<span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
	</div>
	<br>
	<div class="row-fluid">
		<div class="form-group form-horizontal">
		<?php 
			$this->name = JText::_('Новое обращение');
			$this->fieldsname = 'new';
			echo JLayoutHelper::render('joomla.content.options_default', $this);
		?>
		</div>
	</div>
	<div>
		<input type="hidden" name="task"	value="Issue.edit"/>
		<input type="hidden" name="id"		value="<?php echo $this->item->id?>"/>
		<?php echo JHtml::_('form.token'); ?>
		
	</div>
</form>