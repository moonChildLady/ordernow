<?php
/* @var $this InvoiceController */
/* @var $model INVOICE */
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
		<?php echo $form->label($model,'OrderNo'); ?>
		<?php echo $form->textField($model,'OrderNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InvoiceAmount'); ?>
		<?php echo $form->textField($model,'InvoiceAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Discount'); ?>
		<?php echo $form->textField($model,'Discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActualAmount'); ?>
		<?php echo $form->textField($model,'ActualAmount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Remark'); ?>
		<?php echo $form->textField($model,'Remark',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ServiceCharge'); ?>
		<?php echo $form->textField($model,'ServiceCharge'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StaffCode'); ?>
		<?php echo $form->textField($model,'StaffCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedOn'); ?>
		<?php echo $form->textField($model,'CreatedOn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->