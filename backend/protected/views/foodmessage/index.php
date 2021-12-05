<?php
/* @var $this FoodMessageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Foodmessages',
);

$this->menu=array(
	array('label'=>'Create FOODMESSAGE', 'url'=>array('create')),
	array('label'=>'Manage FOODMESSAGE', 'url'=>array('admin')),
);
?>

<h1>Foodmessages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
