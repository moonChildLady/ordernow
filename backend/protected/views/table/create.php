<?php
/* @var $this TableController */
/* @var $model TABLE */

$this->breadcrumbs=array(
	'Tables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TABLE', 'url'=>array('index')),
	array('label'=>'Manage TABLE', 'url'=>array('admin')),
);
?>

<h1>Create TABLE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>