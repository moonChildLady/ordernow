<?php
/* @var $this FoodController */
/* @var $model FOOD */

$this->breadcrumbs=array(
	'Foods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FOOD', 'url'=>array('index')),
	array('label'=>'Manage FOOD', 'url'=>array('admin')),
);
?>

<h1>Create FOOD</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>