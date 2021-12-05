<?php
/* @var $this FoodMessageController */
/* @var $model FOODMESSAGE */

$this->breadcrumbs=array(
	'Foodmessages'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FOODMESSAGE', 'url'=>array('index')),
	array('label'=>'Create FOODMESSAGE', 'url'=>array('create')),
	array('label'=>'View FOODMESSAGE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FOODMESSAGE', 'url'=>array('admin')),
);
?>

<h1>Update FOODMESSAGE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>