<?php
/* @var $this SourceController */
/* @var $model SOURCE */

$this->breadcrumbs=array(
	'Sources'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SOURCE', 'url'=>array('index')),
	array('label'=>'Manage SOURCE', 'url'=>array('admin')),
);
?>

<h1>Create SOURCE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>