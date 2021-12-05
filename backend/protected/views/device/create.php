<?php
/* @var $this DeviceController */
/* @var $model DEVICE */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DEVICE', 'url'=>array('index')),
	array('label'=>'Manage DEVICE', 'url'=>array('admin')),
);
?>

<h1>Create DEVICE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>