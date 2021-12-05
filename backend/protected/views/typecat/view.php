<?php
/* @var $this TypecatController */
/* @var $model TYPECAT */

$this->breadcrumbs=array(
	'Typecats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TYPECAT', 'url'=>array('index')),
	array('label'=>'Create TYPECAT', 'url'=>array('create')),
	array('label'=>'Update TYPECAT', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TYPECAT', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TYPECAT', 'url'=>array('admin')),
);
?>

<h1>View TYPECAT #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'CatID',
		'TypeID',
	),
)); ?>
