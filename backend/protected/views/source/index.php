<?php
/* @var $this SourceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sources',
);

$this->menu=array(
	array('label'=>'Create SOURCE', 'url'=>array('create')),
	array('label'=>'Manage SOURCE', 'url'=>array('admin')),
);
?>

<h1>Sources</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
