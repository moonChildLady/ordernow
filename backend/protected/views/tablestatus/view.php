<?php
/* @var $this TablestatusController */
/* @var $model TABLESTATUS */

$this->breadcrumbs=array(
	'Tablestatuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TABLESTATUS', 'url'=>array('index')),
	array('label'=>'Create TABLESTATUS', 'url'=>array('create')),
	array('label'=>'Update TABLESTATUS', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TABLESTATUS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TABLESTATUS', 'url'=>array('admin')),
);
?>

<h1>View TABLESTATUS #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'TableID',
		'Status',
		'OrderNo',
		'NumberOfSeat',
		'CreatedOn',
		'LastOrder',
		'ExpiredOn',
		'updatetime',
		'Type',
	),
)); ?>
