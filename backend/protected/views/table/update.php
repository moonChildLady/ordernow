<?php
/* @var $this TableController */
/* @var $model TABLE */

$this->breadcrumbs=array(
	'Tables'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TABLE', 'url'=>array('index')),
	array('label'=>'Create TABLE', 'url'=>array('create')),
	array('label'=>'View TABLE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TABLE', 'url'=>array('admin')),
);
?>

<h1>Update TABLE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>