<?php
/* @var $this TypeController */
/* @var $model TYPE */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TYPE', 'url'=>array('index')),
	array('label'=>'Manage TYPE', 'url'=>array('admin')),
);
?>

<h1>Create TYPE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>