<?php
/* @var $this FoodController */
/* @var $model FOOD */

$this->breadcrumbs=array(
	'Foods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FOOD', 'url'=>array('index')),
	array('label'=>'Create FOOD', 'url'=>array('create')),
	array('label'=>'View FOOD', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FOOD', 'url'=>array('admin')),
);
?>

<h1>Update FOOD <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>