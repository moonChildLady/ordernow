<?php
/* @var $this FoodcatController */
/* @var $model FOODCAT */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FoodID'); ?>
		<?php echo $form->textField($model,'FoodID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CatID'); ?>
		<?php echo $form->textField($model,'CatID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Addon'); ?>
		<?php echo $form->textField($model,'Addon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->