<?php
	defined('_JEXEC') or die('Restricted Access');
?>
<tr>
	<th width="2%">
		<?php echo JHtml::_('grid.sort',  'id', 						'id', 					$this->listDirn, $this->listOrder); ?>
	</th>
	<th width="2%">
		<?php //echo JHtml::_('grid.checkall'); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Заголовок обращения',		'caption',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Системный пользователь',	'user_name',			$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Support (ID)',				'supp_id',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Support (Номер)',			'supp_num',				$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Дата создания',				'supp_date_create',		$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Дата завершения',			'supp_date_end',		$this->listDirn, $this->listOrder); ?>
	</th>
	<th>
		<?php echo  JHtml::_('grid.sort',  'Статус',					'supp_status',		$this->listDirn, $this->listOrder); ?>
	</th>
</tr>