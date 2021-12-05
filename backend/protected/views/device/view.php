<?php
/* @var $this DeviceController */
/* @var $model DEVICE */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DEVICE', 'url'=>array('index')),
	array('label'=>'Create DEVICE', 'url'=>array('create')),
	array('label'=>'Update DEVICE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DEVICE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DEVICE', 'url'=>array('admin')),
);
?>

<h1>View DEVICE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uuid',
		//'deviceType',
		array(
                       // 'filter'=>Buyers::model()->forList(),
                        'name'=>'deviceType',
                        'value'=>$model->deviceType0->Name
                ),
		'kitchenType',
		array(
			'name'=>'Enable',
			'value'=>($model->Enable==1)?"NORMAL":"INVAILD"
		),
		'Addon',
		'updatetime'
	),
)); ?>
