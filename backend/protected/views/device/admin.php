<?php
/* @var $this DeviceController */
/* @var $model DEVICE */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DEVICE', 'url'=>array('index')),
	array('label'=>'Create DEVICE', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#device-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Devices</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'device-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'uuid',
		//'deviceType',
		array(
                       // 'filter'=>Buyers::model()->forList(),
                        'name'=>'deviceType',
                        'value'=>'$data->deviceType0->Name'
                ),

		array(
			'name'=>'Enable',
			'value'=>'($data->Enable==1)?"NORMAL":"INVAILD"'
		),
		'Addon',
		'updatetime',

		/*
		'kitchenType',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
