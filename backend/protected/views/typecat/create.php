<?php
/* @var $this TypecatController */
/* @var $model TYPECAT */

$this->breadcrumbs=array(
	'Typecats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TYPECAT', 'url'=>array('index')),
	array('label'=>'Manage TYPECAT', 'url'=>array('admin')),
);
?>

<h1>Create TYPECAT</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>