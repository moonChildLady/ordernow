<?php
/* @var $this TablestatusController */
/* @var $model TABLESTATUS */

$this->breadcrumbs=array(
	'Tablestatuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TABLESTATUS', 'url'=>array('index')),
	array('label'=>'Manage TABLESTATUS', 'url'=>array('admin')),
);
?>

<h1>Create TABLESTATUS</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>