<?php
/* @var $this InvoiceController */
/* @var $model INVOICE */

$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List INVOICE', 'url'=>array('index')),
	array('label'=>'Manage INVOICE', 'url'=>array('admin')),
);
?>

<h1>Create INVOICE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>