<?php
/* @var $this FoodController */
/* @var $model FOOD */

$this->breadcrumbs=array(
	'Foods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FOOD', 'url'=>array('index')),
	array('label'=>'Create FOOD', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#food-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$assetsDir = dirname(__FILE__).'/images/'; 
?>

<h1>Manage Foods</h1>

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
	'id'=>'food-grid',
	'dataProvider'=>$model->search(),
	//'dataProvider' => new CActiveDataProvider('FOOD', array('data'=>$kidModel->toys)),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'EnglishName',
		'ChiName',
		'Description',
		//'Images',
		array(
				'name'=>'Images',
              'type' => 'html',
              'value'=>'(!empty($data->Images))?CHtml::image(Yii::app()->assetManager->publish('.$assetsDir.'$data->Images),"",array("style"=>"width:25px;height:25px;")):"no image"',

           ),

		'Calorie',


		array(
			'name'=>'CatID',
			'value'=>'$data->cat->ChiName'
		),
/*		array(
			'header'=>'Price',
			'value'=>'$data->pRICEs[$data->id]->Price'
		),*/
		/*'Source',
		'updatetime',
		'MessageID',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
