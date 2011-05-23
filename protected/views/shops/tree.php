<?php
$this->breadcrumbs=array(
	'Shops'=>array('/shops'),
	'Tree',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<?php
$this->widget(
    'CTreeView',
    array('url' => array('ajaxFillTree'))
);
?>
