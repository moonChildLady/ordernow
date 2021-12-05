<?php
/* @var $this DevicetypeController */
/* @var $model DEVICETYPE */

$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DEVICETYPE', 'url'=>array('index')),
	array('label'=>'Manage DEVICETYPE', 'url'=>array('admin')),
);
?>

<h1>Create DEVICETYPE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>