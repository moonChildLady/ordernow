<?php
/* @var $this FoodMessageController */
/* @var $model FOODMESSAGE */

$this->breadcrumbs=array(
	'Foodmessages'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List FOODMESSAGE', 'url'=>array('index')),
	array('label'=>'Create FOODMESSAGE', 'url'=>array('create')),
	array('label'=>'Update FOODMESSAGE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FOODMESSAGE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FOODMESSAGE', 'url'=>array('admin')),
);
?>

<h1>View FOODMESSAGE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
	),
)); ?>
