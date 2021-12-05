<?php
/* @var $this CatController */
/* @var $model CAT */

$this->breadcrumbs=array(
	'Cats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CAT', 'url'=>array('index')),
	array('label'=>'Create CAT', 'url'=>array('create')),
	array('label'=>'View CAT', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CAT', 'url'=>array('admin')),
);
?>

<h1>Update CAT <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>