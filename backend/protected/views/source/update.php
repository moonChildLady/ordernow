<?php
/* @var $this SourceController */
/* @var $model SOURCE */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SOURCE', 'url'=>array('index')),
	array('label'=>'Create SOURCE', 'url'=>array('create')),
	array('label'=>'View SOURCE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SOURCE', 'url'=>array('admin')),
);
?>

<h1>Update SOURCE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>