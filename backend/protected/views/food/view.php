<?php
/* @var $this FoodController */
/* @var $model FOOD */

$this->breadcrumbs=array(
	'Foods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FOOD', 'url'=>array('index')),
	array('label'=>'Create FOOD', 'url'=>array('create')),
	array('label'=>'Update FOOD', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FOOD', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FOOD', 'url'=>array('admin')),
);
?>

<h1>View FOOD #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'EnglishName',
		'ChiName',
		'Description',
		'Images',
		'Calorie',
		'CatID',
		'Source',
		'updatetime',
		'MessageID',
	),
)); ?>
