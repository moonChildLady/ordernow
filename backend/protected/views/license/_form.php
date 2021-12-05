<?php
/* @var $this LicenseController */
/* @var $model LICENSE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'license-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LicenseCode'); ?>
		<?php echo $form->textField($model,'LicenseCode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'LicenseCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Number'); ?>
		<?php echo $form->textField($model,'Number'); ?>
		<?php echo $form->error($model,'Number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Addon'); ?>
		<?php echo $form->textField($model,'Addon'); ?>
		<?php echo $form->error($model,'Addon'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->