<?php
/* @var $this FoodController */
/* @var $model FOOD */
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
		<?php echo $form->label($model,'EnglishName'); ?>
		<?php echo $form->textField($model,'EnglishName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChiName'); ?>
		<?php echo $form->textField($model,'ChiName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Images'); ?>
		<?php echo $form->textField($model,'Images',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Calorie'); ?>
		<?php echo $form->textField($model,'Calorie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CatID'); ?>
		<?php echo $form->textField($model,'CatID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Source'); ?>
		<?php echo $form->textField($model,'Source'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageID'); ?>
		<?php echo $form->textField($model,'MessageID',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->