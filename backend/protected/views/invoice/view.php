<?php
/* @var $this InvoiceController */
/* @var $model INVOICE */

$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List INVOICE', 'url'=>array('index')),
	array('label'=>'Create INVOICE', 'url'=>array('create')),
	array('label'=>'Update INVOICE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete INVOICE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage INVOICE', 'url'=>array('admin')),
);
?>

<h1>View INVOICE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'OrderNo',
		'InvoiceAmount',
		'Discount',
		'ActualAmount',
		'Remark',
		'ServiceCharge',
		'StaffCode',
		'CreatedOn',
		'updatetime',
	),
)); ?>
