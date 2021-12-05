<?php
/* @var $this TableController */
/* @var $model TABLE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'table-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'DeviceID'); ?>
		<?php echo $form->textField($model,'DeviceID'); ?>
		<?php echo $form->error($model,'DeviceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TableNo'); ?>
		<?php echo $form->textField($model,'TableNo',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'TableNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Enable'); ?>
		<?php echo $form->dropDownList($model,'Enable',array('1'=>'NORMAL','2'=>'INVAILD'));?>
		<?php echo $form->error($model,'Enable'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->