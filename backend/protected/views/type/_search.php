<?php
/* @var $this TypeController */
/* @var $model TYPE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
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
		<?php echo $form->label($model,'StartTime'); ?>
		<?php echo $form->textField($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndTime'); ?>
		<?php echo $form->textField($model,'EndTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enable'); ?>
		<?php echo $form->textField($model,'Enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastOrder'); ?>
		<?php echo $form->textField($model,'LastOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndOrder'); ?>
		<?php echo $form->textField($model,'EndOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Full'); ?>
		<?php echo $form->textField($model,'Full'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Half'); ?>
		<?php echo $form->textField($model,'Half'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buffet'); ?>
		<?php echo $form->textField($model,'buffet'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->