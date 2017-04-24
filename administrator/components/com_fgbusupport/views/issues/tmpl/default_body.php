<?php
// Права доступа
defined('_JEXEC') or die('Restricted Access');
$canEdit    = true;//$user->authorise('core.edit',       'com_contact.category.' . $item->catid);
$canEditOwn = true;//$user->authorise('core.edit.own',   'com_contact.category.' . $item->catid) && $item->created_by == $userId;
?>
<?php 
	$db = JFactory::getDBO();
	$query = $db->getQuery(true);
	foreach($this->items as $i => $item): 
	?>
		<tr class="row<?php echo $i % 2; ?>">
			<td><?php echo $item->id; ?></td>
			<td><?php //echo (($item->id !=1)?JHtml::_('grid.id', $i, $item->id):''); ?></td>
			<td><a target="_blank" href="<?php Echo $this->URL."/dashboard/search_issue?supportca=6&number_issue_id=".$item->supp_num ?>"><?php echo $item->caption; ?></a></td>
			<td class="small hidden-phone hidden-tablet">
				<?php if (!empty($item->user_id)) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_users&task=user.edit&id=' . $item->user_id); ?>"><?php echo $item->user_name; ?></a>
					<div class="small"><?php echo $item->user_email; ?></div>
				<?php endif; ?>
			</td>
			<td><?php echo $item->supp_id; ?></td>
			<td><?php echo $item->supp_num; ?></td>
			<td><?php echo $item->supp_date_create; ?></td>
			<td><?php echo $item->supp_date_end; ?></td>
			<td><span class="label" style="background-color:<?php echo $item->supp_status_color; ?>"><?php echo $item->supp_status; ?></span></td>
		</tr>
	<?php endforeach; ?>