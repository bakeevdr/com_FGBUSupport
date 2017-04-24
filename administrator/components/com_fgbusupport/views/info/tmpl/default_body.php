<?php
	defined('_JEXEC') or die('Restricted Access');
	foreach($this->items as $i => $item): 
	?>
		<tr class="row<?php echo $i % 2; ?>">
			<td><?php echo $item->date; ?></td>
			<td><?php echo str_replace(';',';<br>',$item->description); ?></td>
		</tr>
	<?php endforeach; ?>