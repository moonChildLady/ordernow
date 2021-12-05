<?php
/* @var $this LicenseController */
/* @var $model LICENSE */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LICENSE', 'url'=>array('index')),
	array('label'=>'Manage LICENSE', 'url'=>array('admin')),
);
?>

<h1>Create LICENSE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>