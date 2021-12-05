<?php
/* @var $this InvoiceController */
/* @var $model INVOICE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'OrderNo'); ?>
		<?php echo $form->textField($model,'OrderNo'); ?>
		<?php echo $form->error($model,'OrderNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'InvoiceAmount'); ?>
		<?php echo $form->textField($model,'InvoiceAmount'); ?>
		<?php echo $form->error($model,'InvoiceAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Discount'); ?>
		<?php echo $form->textField($model,'Discount'); ?>
		<?php echo $form->error($model,'Discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActualAmount'); ?>
		<?php echo $form->textField($model,'ActualAmount'); ?>
		<?php echo $form->error($model,'ActualAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Remark'); ?>
		<?php echo $form->textField($model,'Remark',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ServiceCharge'); ?>
		<?php echo $form->textField($model,'ServiceCharge'); ?>
		<?php echo $form->error($model,'ServiceCharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StaffCode'); ?>
		<?php echo $form->textField($model,'StaffCode'); ?>
		<?php echo $form->error($model,'StaffCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedOn'); ?>
		<?php echo $form->textField($model,'CreatedOn'); ?>
		<?php echo $form->error($model,'CreatedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->