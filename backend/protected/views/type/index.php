<?php
/* @var $this TypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Types',
);

$this->menu=array(
	array('label'=>'Create TYPE', 'url'=>array('create')),
	array('label'=>'Manage TYPE', 'url'=>array('admin')),
);
?>

<h1>Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
