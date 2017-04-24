<?php
	defined('_JEXEC') or die('Restricted Access');
	$this->listOrder  = $this->escape($this->state->get('list.ordering'));
	$this->listDirn   = $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_fgbusupport&view=Issues'); ?>" method="post" name="adminForm" id="adminForm">

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<div id="filter-bar" class="btn-toolbar">
			<div class="filter-search btn-group pull-left">
				<input type="text" name="filter_search" id="filter_search" placeholder="Поиск" value="<?php echo $this->state->get('filter.search'); ?>" class="hasTooltip" title="Поиск по " />
			</div>
			<div class="btn-group pull-left">
				<button type="submit" class="btn hasTooltip"><i class="icon-search"></i></button>
				<button type="button" class="btn hasTooltip" onclick="document.getElementById('filter_search').value='';this.form.submit();"> <i class="icon-remove"></i></button>
			</div>
		</div>
		<table class="table table-striped" id="weblinkList">
			<thead><?php echo $this->loadTemplate('head');?></thead>
			<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
			<tbody><?php echo $this->loadTemplate('body');?></tbody>
		</table>
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="option" value="com_fgbusupport" />
			<input type="hidden" name="view" value="Issues" />
			<input type="hidden" name="filter_order" value="<?php echo $this->listOrder; ?>" />
			<input type="hidden" name="filter_order_Dir" value="<?php echo $this->listDirn; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</div>
</form>
