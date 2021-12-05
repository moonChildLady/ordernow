<?php
/* @var $this DeviceController */
/* @var $model DEVICE */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DEVICE', 'url'=>array('index')),
	array('label'=>'Create DEVICE', 'url'=>array('create')),
	array('label'=>'View DEVICE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DEVICE', 'url'=>array('admin')),
);
?>

<h1>Update DEVICE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>