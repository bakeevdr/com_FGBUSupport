<?php
	defined('_JEXEC') or die('Restricted Access');
?>
<thead>
	<tr>
		<th><?php echo  JHtml::_('searchtools.sort',  '№',		'supp_num',		$this->listDirn, $this->listOrder); ?></th>
		<th><?php echo  JHtml::_('searchtools.sort',  'Заголовок обращения',		'caption',		$this->listDirn, $this->listOrder); ?></th>
		<th>Дата создания</th>
		<th>Дата завершения</th>
		<th>Статус</th>
	</tr>
</thead>