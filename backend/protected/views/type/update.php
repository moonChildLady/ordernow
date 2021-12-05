<?php
/* @var $this TypeController */
/* @var $model TYPE */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TYPE', 'url'=>array('index')),
	array('label'=>'Create TYPE', 'url'=>array('create')),
	array('label'=>'View TYPE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TYPE', 'url'=>array('admin')),
);
?>

<h1>Update TYPE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>