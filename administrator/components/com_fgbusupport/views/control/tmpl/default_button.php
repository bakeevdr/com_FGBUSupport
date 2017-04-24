<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
	<div class="thumbnails">
		<a class="thumbnail" href="<?php echo $this->item->link; ?>">
				<?php echo JHTML::_('image',$this->item->img, JText::_($this->item->title));?>
			<br />
			<span>
				<?php echo JText::_($this->item->title); ?>
			</span>
		</a>
	</div>
