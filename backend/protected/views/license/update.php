<?php
/* @var $this LicenseController */
/* @var $model LICENSE */

$this->breadcrumbs=array(
	'Licenses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LICENSE', 'url'=>array('index')),
	array('label'=>'Create LICENSE', 'url'=>array('create')),
	array('label'=>'View LICENSE', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LICENSE', 'url'=>array('admin')),
);
?>

<h1>Update LICENSE <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>