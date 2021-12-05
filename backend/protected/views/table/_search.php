<?php
/* @var $this TableController */
/* @var $model TABLE */
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
		<?php echo $form->label($model,'DeviceID'); ?>
		<?php echo $form->textField($model,'DeviceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uuid'); ?>
		<?php echo $form->textField($model,'uuid',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TableNo'); ?>
		<?php echo $form->textField($model,'TableNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enable'); ?>
		<?php echo $form->textField($model,'Enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedOn'); ?>
		<?php echo $form->textField($model,'CreatedOn'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->