<?php
/* @var $this TypecatController */
/* @var $model TYPECAT */

$this->breadcrumbs=array(
	'Typecats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TYPECAT', 'url'=>array('index')),
	array('label'=>'Create TYPECAT', 'url'=>array('create')),
	array('label'=>'View TYPECAT', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TYPECAT', 'url'=>array('admin')),
);
?>

<h1>Update TYPECAT <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>