<?php
/* @var $this PriceController */
/* @var $model PRICE */

$this->breadcrumbs=array(
	'Prices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PRICE', 'url'=>array('index')),
	array('label'=>'Create PRICE', 'url'=>array('create')),
	array('label'=>'View PRICE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PRICE', 'url'=>array('admin')),
);
?>

<h1>Update PRICE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>