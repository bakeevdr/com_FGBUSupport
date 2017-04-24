<?php
	defined('_JEXEC') or die('Restricted Access');
	$this->listOrder  = $this->escape($this->state->get('list.ordering'));
	$this->listDirn   = $this->escape($this->state->get('list.direction'));
?>
<tr>
	<th width="2%">
		<?php echo JHtml::_('searchtools.sort',  'id', 							'id', 					$this->listDirn, $this->listOrder); ?>
	</th>
	<th width="2%">
		<?php //echo JHtml::_('searchtools.checkall'); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Заголовок обращения',		'issue.caption',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Системный пользователь',		'users.name',			$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Support (ID)',				'issue.supp_id',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Support (Номер)',			'issue.supp_num',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Дата создания',				'issue.supp_date_create',		$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Дата завершения',			'issue.supp_date_end',		$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('searchtools.sort',  'Статус',						'status.name',		$this->listDirn, $this->listOrder); ?>
	</th>
</tr>