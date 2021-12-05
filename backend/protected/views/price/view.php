<?php
/* @var $this PriceController */
/* @var $model PRICE */

$this->breadcrumbs=array(
	'Prices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PRICE', 'url'=>array('index')),
	array('label'=>'Create PRICE', 'url'=>array('create')),
	array('label'=>'Update PRICE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PRICE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PRICE', 'url'=>array('admin')),
);
?>

<h1>View PRICE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'FoodID',
		'Price',
		'AddOn',
		'Enable',
	),
)); ?>
