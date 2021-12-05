<?php
/* @var $this TablestatusController */
/* @var $model TABLESTATUS */

$this->breadcrumbs=array(
	'Tablestatuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TABLESTATUS', 'url'=>array('index')),
	array('label'=>'Create TABLESTATUS', 'url'=>array('create')),
	array('label'=>'View TABLESTATUS', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TABLESTATUS', 'url'=>array('admin')),
);
?>

<h1>Update TABLESTATUS <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>