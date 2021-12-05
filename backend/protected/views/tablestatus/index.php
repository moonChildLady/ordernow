<?php
/* @var $this TablestatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tablestatuses',
);

$this->menu=array(
	array('label'=>'Create TABLESTATUS', 'url'=>array('create')),
	array('label'=>'Manage TABLESTATUS', 'url'=>array('admin')),
);
?>

<h1>Tablestatuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
