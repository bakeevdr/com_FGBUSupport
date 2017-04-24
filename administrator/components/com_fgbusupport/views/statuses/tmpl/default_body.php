<?php
	defined('_JEXEC') or die('Restricted Access');
	foreach($this->items as $i => $item): 
	?>
		<tr class="row<?php echo $i % 2; ?>">
			<td><?php echo $item->id; ?></td>
			<td><span class="label" style="background-color:<?php echo $item->color; ?>"><?php echo $item->name; ?></span></td>
			<td><?php echo $item->code; ?></td>
			<td><?php echo $item->color; ?></td>
		</tr>
	<?php endforeach; ?>