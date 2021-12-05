<?php
/* @var $this TypecatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Typecats',
);

$this->menu=array(
	array('label'=>'Create TYPECAT', 'url'=>array('create')),
	array('label'=>'Manage TYPECAT', 'url'=>array('admin')),
);
?>

<h1>Typecats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
