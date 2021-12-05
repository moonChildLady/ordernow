<?php
/* @var $this TablestatusController */
/* @var $model TABLESTATUS */
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
		<?php echo $form->label($model,'TableID'); ?>
		<?php echo $form->textField($model,'TableID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OrderNo'); ?>
		<?php echo $form->textField($model,'OrderNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumberOfSeat'); ?>
		<?php echo $form->textField($model,'NumberOfSeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedOn'); ?>
		<?php echo $form->textField($model,'CreatedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastOrder'); ?>
		<?php echo $form->textField($model,'LastOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExpiredOn'); ?>
		<?php echo $form->textField($model,'ExpiredOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->