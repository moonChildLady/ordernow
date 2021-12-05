<?php
/* @var $this FoodcatController */
/* @var $model FOODCAT */

$this->breadcrumbs=array(
	'Foodcats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FOODCAT', 'url'=>array('index')),
	array('label'=>'Manage FOODCAT', 'url'=>array('admin')),
);
?>

<h1>Create FOODCAT</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>