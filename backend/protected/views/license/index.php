<?php
/* @var $this LicenseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Licenses',
);

$this->menu=array(
	array('label'=>'Create LICENSE', 'url'=>array('create')),
	array('label'=>'Manage LICENSE', 'url'=>array('admin')),
);
?>

<h1>Licenses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
