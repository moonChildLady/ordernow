<?php
/* @var $this FoodcatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Foodcats',
);

$this->menu=array(
	array('label'=>'Create FOODCAT', 'url'=>array('create')),
	array('label'=>'Manage FOODCAT', 'url'=>array('admin')),
);
?>

<h1>Foodcats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
