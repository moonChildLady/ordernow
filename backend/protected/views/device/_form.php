<?php
/* @var $this DeviceController */
/* @var $model DEVICE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'device-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uuid'); ?>
		<?php echo $form->textField($model,'uuid',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'uuid'); ?>
	</div>


	<!--div class="row">
		<?php echo $form->labelEx($model,'Addon'); ?>
		<?php echo $form->textField($model,'Addon'); ?>
		<?php echo $form->error($model,'Addon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div-->

	<div class="row">
		<?php echo $form->labelEx($model,'deviceType'); ?>


		<?php //echo $form->textField($model,'deviceType');
		$list = CHtml::listData(DEVICETYPE::model()->findAll(), 'id', 'Name');
		echo $form->dropDownList($model,'deviceType',$list);?>
		<?php echo $form->error($model,'deviceType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kitchenType'); ?>
		<?php echo $form->textField($model,'kitchenType'); ?>
		<?php echo $form->error($model,'kitchenType'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Enable'); ?>
		<?php echo $form->dropDownList($model,'Enable',array('1'=>'NORMAL','0'=>'INVAILD'));?>
		<?php echo $form->error($model,'Enable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->