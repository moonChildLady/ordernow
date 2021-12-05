<?php
/* @var $this TypeController */
/* @var $model TYPE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'type-form',
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
		<?php echo $form->labelEx($model,'StartTime'); ?>
		<?php //echo $form->textField($model,'StartTime'); ?>
<?php
$form->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'TYPE[StartTime]',
	'value'=>$model->StartTime,
    //'flat'=>true,//remove to hide the datepicker
    'options'=>array(
		'dateFormat' => 'yy-mm-dd 00:00:00',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'showOtherMonths'=>true,// Show Other month in jquery
        'selectOtherMonths'=>true,// Select Other month in jquery
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>
		<?php echo $form->error($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndTime'); ?>
		<?php
$form->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'TYPE[EndTime]',
	'value'=>$model->EndTime,
    //'flat'=>true,//remove to hide the datepicker
    'options'=>array(
		'dateFormat' => 'yy-mm-dd 00:00:00',
        'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        'showOtherMonths'=>true,// Show Other month in jquery
        'selectOtherMonths'=>true,// Select Other month in jquery
    ),
    'htmlOptions'=>array(
        'style'=>''
    ),
));
?>
		<?php echo $form->error($model,'EndTime'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'LastOrder'); ?>
		<?php echo $form->textField($model,'LastOrder'); ?>
		<?php echo $form->error($model,'LastOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndOrder'); ?>
		<?php echo $form->textField($model,'EndOrder'); ?>
		<?php echo $form->error($model,'EndOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buffet'); ?>
		<?php //echo $form->textField($model,'buffet'); ?>
		<?php echo $form->dropDownList($model,'buffet',array('1'=>'YES','0'=>'NO'));?>
		<?php echo $form->error($model,'buffet'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Full'); ?>
		<?php echo $form->textField($model,'Full'); ?>
		<?php echo $form->error($model,'Full'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Half'); ?>
		<?php echo $form->textField($model,'Half'); ?>
		<?php echo $form->error($model,'Half'); ?>
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