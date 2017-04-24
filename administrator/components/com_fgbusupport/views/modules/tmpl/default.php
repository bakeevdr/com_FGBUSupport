<?php
	defined('_JEXEC') or die('Restricted Access');
?>
<form action="<?php echo JRoute::_('index.php?option=com_fgbusupport&view=modules'); ?>" method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<table class="table table-striped" id="weblinkList">
			<thead><?php echo $this->loadTemplate('head');?></thead>
			<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
			<tbody><?php echo $this->loadTemplate('body');?></tbody>
		</table>
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="com_fgbusupport" />
			<input type="hidden" name="view" value="modules" />
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
