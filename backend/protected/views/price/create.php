<?php
/* @var $this PriceController */
/* @var $model PRICE */

$this->breadcrumbs=array(
	'Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PRICE', 'url'=>array('index')),
	array('label'=>'Manage PRICE', 'url'=>array('admin')),
);
?>

<h1>Create PRICE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>