<?php defined('_JEXEC') or die('Restricted access'); ?>

<style type="text/css">
	.thumbnails {
		float: left;
		margin: 0 auto;
		padding: 5px;
		text-align: center;
	}
	.thumbnail {
		border-radius: 10px;
		height: 100px;
		width: 150px;
		background: -moz-linear-gradient(top,#e5e5e5 0%, #ffffff 34%, #ffffff 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e5e5e5), color-stop(34%,#ffffff), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top, #e5e5e5 0%,#ffffff 34%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top, #e5e5e5 0%,#ffffff 34%,#ffffff 100%); /* Opera11.10+ */
		background: -ms-linear-gradient(top, #e5e5e5 0%,#ffffff 34%,#ffffff 100%); /* IE10+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e5e5e5', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
	}
	.thumbnail:hover, .thumbnail:focus {
		background: -moz-linear-gradient(top,#ffffff 0%, #ffffff 34%, #e5e5e5 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(34%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top, #ffffff 0%,#ffffff 34%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top, #ffffff 0%,#ffffff 34%,#e5e5e5 100%); /* Opera11.10+ */
		background: -ms-linear-gradient(top, #ffffff 0%,#ffffff 34%,#e5e5e5 100%); /* IE10+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */
		text-decoration: none;
	}
	.thumbnail img {
		margin-bottom: -12px;
		margin-top: 10px;
	}
	
</style>
	<?php 
	foreach($this->items as $item):
		$this->item = $item;
		echo $this->loadTemplate('button');
	endforeach;   
	?>
