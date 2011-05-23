<?php
$this->breadcrumbs=array(
	'Shops',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
 'dataProvider'=>$model->search(),
 'filter'=>$model,
 'columns'=>array(
	'voivodship', 'city', 'street', 'place'
 ),
)); 

?>