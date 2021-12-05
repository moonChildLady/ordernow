<?php
/* @var $this DevicetypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devicetypes',
);

$this->menu=array(
	array('label'=>'Create DEVICETYPE', 'url'=>array('create')),
	array('label'=>'Manage DEVICETYPE', 'url'=>array('admin')),
);
?>

<h1>Devicetypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
