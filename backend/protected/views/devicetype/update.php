<?php
/* @var $this DevicetypeController */
/* @var $model DEVICETYPE */

$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DEVICETYPE', 'url'=>array('index')),
	array('label'=>'Create DEVICETYPE', 'url'=>array('create')),
	array('label'=>'View DEVICETYPE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DEVICETYPE', 'url'=>array('admin')),
);
?>

<h1>Update DEVICETYPE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>