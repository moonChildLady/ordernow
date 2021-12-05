<?php
/* @var $this FoodcatController */
/* @var $model FOODCAT */

$this->breadcrumbs=array(
	'Foodcats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FOODCAT', 'url'=>array('index')),
	array('label'=>'Create FOODCAT', 'url'=>array('create')),
	array('label'=>'View FOODCAT', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FOODCAT', 'url'=>array('admin')),
);
?>

<h1>Update FOODCAT <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>