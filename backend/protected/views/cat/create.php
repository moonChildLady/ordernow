<?php
/* @var $this CatController */
/* @var $model CAT */

$this->breadcrumbs=array(
	'Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CAT', 'url'=>array('index')),
	array('label'=>'Manage CAT', 'url'=>array('admin')),
);
?>

<h1>Create CAT</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>