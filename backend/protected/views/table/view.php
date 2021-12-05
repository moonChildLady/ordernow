<?php
/* @var $this TableController */
/* @var $model TABLE */

$this->breadcrumbs=array(
	'Tables'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TABLE', 'url'=>array('index')),
	array('label'=>'Create TABLE', 'url'=>array('create')),
	array('label'=>'Update TABLE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TABLE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TABLE', 'url'=>array('admin')),
);
?>

<h1>View TABLE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'DeviceID',
		'TableNo',
		array(
			'name'=>'Enable',
			'value'=>($model->Enable==1)?"NORMAL":"INVAILD"
		),
		'CreatedOn',
	),
)); ?>
