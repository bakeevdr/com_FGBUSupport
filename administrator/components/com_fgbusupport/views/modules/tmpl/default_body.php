<?php
	defined('_JEXEC') or die('Restricted Access');
	//Echo '<pre>';	var_export($this->items); 	Echo '</pre>';
	foreach($this->items as $i => $item): 
	?>
		<tr class="row<?php echo $i % 2; ?> <?php Echo (!isset($item->state)?'info':'')?>">
			<td><?php echo ($item->id < 0?'':$item->id); ?></td>
			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td class="center">
			<div class="btn-group">
			<?php 
				if (isset($item->state)) {
					echo JHtml::_('jgrid.state', 
							array ( 
								0 => array ( 'task' => 'publish',   'text' => '', 'active_title' => 'Включить',  'inactive_title' => '', 'tip' => true, 'active_class' => 'unpublish', 'inactive_class' => 'unpublish', ), 
								1 => array ( 'task' => 'unpublish', 'text' => '', 'active_title' => 'Выключить', 'inactive_title' => '', 'tip' => true, 'active_class' => 'publish',   'inactive_class' => 'publish', ), 
							) 
							, $item->state, $i, 'modules.');/**/
				}Else {
					JHtml::_('actionsdropdown.addCustomItem', 'Включен','publish','cb'.$i, 'modules.publish');
					JHtml::_('actionsdropdown.addCustomItem', 'Выключен','unpublish','cb'.$i, 'modules.unpublish');
					echo JHtml::_('actionsdropdown.render');
				}
			?>
			</div>
			<td><?php echo $item->supp_modul_name; ?></td>
			<td><?php echo $item->changed_name; ?></td>
			<td><?php echo $item->supp_modul_id; ?></td>
			<td><?php echo $item->supp_version; ?></td>
		</tr>
	<?php endforeach; ?>