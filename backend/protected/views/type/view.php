<?php
/* @var $this TypeController */
/* @var $model TYPE */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TYPE', 'url'=>array('index')),
	array('label'=>'Create TYPE', 'url'=>array('create')),
	array('label'=>'Update TYPE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TYPE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TYPE', 'url'=>array('admin')),
);
?>

<h1>View TYPE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'EnglishName',
		'ChiName',
		'StartTime',
		'EndTime',
		'Enable',
		'LastOrder',
		'EndOrder',
		'Full',
		'Half',
		'buffet',
	),
)); ?>
