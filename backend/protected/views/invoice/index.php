<?php
/* @var $this InvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Invoices',
);

$this->menu=array(
	array('label'=>'Create INVOICE', 'url'=>array('create')),
	array('label'=>'Manage INVOICE', 'url'=>array('admin')),
);
?>

<h1>Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
