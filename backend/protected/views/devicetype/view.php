<?php
/* @var $this DevicetypeController */
/* @var $model DEVICETYPE */

$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List DEVICETYPE', 'url'=>array('index')),
	array('label'=>'Create DEVICETYPE', 'url'=>array('create')),
	array('label'=>'Update DEVICETYPE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DEVICETYPE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DEVICETYPE', 'url'=>array('admin')),
);
?>

<h1>View DEVICETYPE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
	),
)); ?>
