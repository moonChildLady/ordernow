<?php
/* @var $this FoodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Foods',
);

$this->menu=array(
	array('label'=>'Create FOOD', 'url'=>array('create')),
	array('label'=>'Manage FOOD', 'url'=>array('admin')),
);
?>

<h1>Foods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
