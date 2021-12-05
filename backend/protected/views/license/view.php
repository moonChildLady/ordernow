<?php
/* @var $this LicenseController */
/* @var $model LICENSE */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LICENSE', 'url'=>array('index')),
	array('label'=>'Create LICENSE', 'url'=>array('create')),
	array('label'=>'Update LICENSE', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LICENSE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LICENSE', 'url'=>array('admin')),
);
?>

<h1>View LICENSE #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'LicenseCode',
		'Number',
		'Addon',
	),
)); ?>
