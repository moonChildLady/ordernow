<?php
/* @var $this CatController */
/* @var $model CAT */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EnglishName'); ?>
		<?php echo $form->textField($model,'EnglishName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EnglishName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ChiName'); ?>
		<?php echo $form->textField($model,'ChiName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ChiName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Ordering'); ?>
		<?php echo $form->textField($model,'Ordering'); ?>
		<?php echo $form->error($model,'Ordering'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->