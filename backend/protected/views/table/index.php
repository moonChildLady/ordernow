<?php
/* @var $this TableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tables',
);

$this->menu=array(
	array('label'=>'Create TABLE', 'url'=>array('create')),
	array('label'=>'Manage TABLE', 'url'=>array('admin')),
);
?>

<h1>Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
