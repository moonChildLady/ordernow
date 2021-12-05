<?php
/* @var $this FoodMessageController */
/* @var $model FOODMESSAGE */

$this->breadcrumbs=array(
	'Foodmessages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FOODMESSAGE', 'url'=>array('index')),
	array('label'=>'Manage FOODMESSAGE', 'url'=>array('admin')),
);
?>

<h1>Create FOODMESSAGE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>