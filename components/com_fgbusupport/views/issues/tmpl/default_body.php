<?php
defined('_JEXEC') or die('Restricted Access');
//var_export($this->items);
?>
<tbody>
	<?php 
	if (!empty($this->items))
		foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td><?php echo $item->supp_num; ?></td>
		<td>
			<?php Echo '<a href="'.JRoute::_('index.php?option=com_fgbusupport&view=answer&id='.$item->id).'">'.$item->caption.'</a>' ; ?>
		</td>
		<td><?php echo $item->supp_date_create; ?></td>
		<td><?php echo $item->supp_date_end; ?></td>
		<td><span class="label" style="background-color:<?php echo $item->supp_status_color; ?>"><?php echo $item->supp_status; ?></span></td>
	</tr>
	<?php endforeach; ?>
</tbody>