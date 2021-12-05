<?php
/* @var $this InvoiceController */
/* @var $model INVOICE */

$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List INVOICE', 'url'=>array('index')),
	array('label'=>'Create INVOICE', 'url'=>array('create')),
	array('label'=>'View INVOICE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage INVOICE', 'url'=>array('admin')),
);
?>

<h1>Update INVOICE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>