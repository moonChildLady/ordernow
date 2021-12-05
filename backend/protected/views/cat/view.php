<?php
/* @var $this CatController */
/* @var $model CAT */

$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CAT', 'url'=>array('index')),
	array('label'=>'Create CAT', 'url'=>array('create')),
	array('label'=>'Update CAT', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CAT', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CAT', 'url'=>array('admin')),
);
?>

<h1>View CAT #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'EnglishName',
		'ChiName',
		'Ordering',
		'updatetime',
	),
)); ?>
