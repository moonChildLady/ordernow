<?php
/* @var $this FoodController */
/* @var $data FOOD */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnglishName')); ?>:</b>
	<?php echo CHtml::encode($data->EnglishName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChiName')); ?>:</b>
	<?php echo CHtml::encode($data->ChiName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Images')); ?>:</b>
	<?php echo CHtml::encode($data->Images); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Calorie')); ?>:</b>
	<?php echo CHtml::encode($data->Calorie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatID')); ?>:</b>
	<?php echo CHtml::encode($data->CatID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Source')); ?>:</b>
	<?php echo CHtml::encode($data->Source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageID')); ?>:</b>
	<?php echo CHtml::encode($data->MessageID); ?>
	<br />

	*/ ?>

</div>