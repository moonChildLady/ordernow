<?php
/* @var $this FoodController */
/* @var $model FOOD */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'food-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>
 <?php
		if (!$model->isNewRecord) {
			if ( $model->Images != ""){
				$images= $model->Images;
				if (count($images) > 0) {

						echo "<div class = 'pic' id='".str_replace(".", "_", $images)."'>";
						echo CHtml::image(Yii::app()->baseUrl.'/images/'.$images);
						echo "<br />";
						echo CHtml::ajaxLink(
								'Delete',
								array('food/removeImg'),
								array(
									'data'=>array('id'=>$model->id,'image'=>$images),
									'success' => 'function(data) { $("#'.str_replace(".", "_", $images).'").hide(); }'
								),
								array('confirm' => 'This will be deleted permanently!')

							);
						echo "<hr>";
					    echo "</div>";
					
				}
				}
			}
				?>

  <div class="row">
		<?php echo $form->labelEx($model,'Images'); ?>
		<?php //echo $form->textField($model,'images'); ?>
		<?php //echo $form->error($model,'images'); 
			$this->widget('CMultiFileUpload', array(
					'name' => 'Images',
					'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
					'duplicate' => 'Duplicate file!', // useful, i think
					'denied' => 'Invalid file type', // useful, i think
				));
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Calorie'); ?>
		<?php echo $form->textField($model,'Calorie'); ?>
		<?php echo $form->error($model,'Calorie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CatID'); ?>
		<?php //echo $form->textField($model,'CatID');
		$list = CHtml::listData(CAT::model()->findAll(), 'id', 'ChiName');
		echo $form->dropDownList($model,'CatID',$list);
		?>
		<?php echo $form->error($model,'CatID'); ?>
	</div>
	


	<div class="row">
		<?php echo $form->labelEx($model,'Source'); ?>
		<?php // echo $form->textField($model,'Source');

		$list = CHtml::listData(SOURCE::model()->findAll(), 'id', 'ChiName');
		echo $form->dropDownList($model,'Source',$list);
		?>
		<?php echo $form->error($model,'Source'); ?>
	</div>

	<!--div class="row">
		<?php echo $form->labelEx($model,'updatetime'); ?>
		<?php echo $form->textField($model,'updatetime'); ?>
		<?php echo $form->error($model,'updatetime'); ?>
	</div-->

	<div class="row">
		<?php echo $form->labelEx($model,'MessageID'); ?>
		<?php echo $form->textField($model,'MessageID',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'MessageID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php /*
		<div class="row">
		<?php echo $form->labelEx($model->pRICEs[$model->id],'Price'); ?>
		<?php //echo $form->textField($model,'CatID');
		//$list = CHtml::listData(CAT::model()->findAll(), 'id', 'ChiName');
		//echo $form->dropDownList($model,'CatID',$list);
		 echo $form->textField($model->pRICEs[$model->id],'Price');
		?>
		<?php echo $form->error($model->pRICEs[$model->id],'Price'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'Images'); ?>
		<?php echo $form->textField($model,'Images',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Images'); ?>
	</div>
*/
?>