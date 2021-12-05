<?php
/* @var $this TablestatusController */
/* @var $model TABLESTATUS */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tablestatus-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TableID'); ?>
		<?php echo $form->textField($model,'TableID'); ?>
		<?php echo $form->error($model,'TableID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OrderNo'); ?>
		<?php echo $form->textField($model,'OrderNo'); ?>
		<?php echo $form->error($model,'OrderNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumberOfSeat'); ?>
		<?php echo $form->textField($model,'NumberOfSeat'); ?>
		<?php echo $form->error($model,'NumberOfSeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedOn'); ?>
		<?php echo $form->textField($model,'CreatedOn'); ?>
		<?php echo $form->error($model,'CreatedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastOrder'); ?>
		<?php echo $form->textField($model,'LastOrder'); ?>
		<?php echo $form->error($model,'LastOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExpiredOn'); ?>
		<?php echo $form->textField($model,'ExpiredOn'); ?>
		<?php echo $form->error($model,'ExpiredOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->