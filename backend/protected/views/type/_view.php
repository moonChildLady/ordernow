<?php
/* @var $this TypeController */
/* @var $data TYPE */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartTime')); ?>:</b>
	<?php echo CHtml::encode($data->StartTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndTime')); ?>:</b>
	<?php echo CHtml::encode($data->EndTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Enable')); ?>:</b>
	<?php echo CHtml::encode($data->Enable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastOrder')); ?>:</b>
	<?php echo CHtml::encode($data->LastOrder); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EndOrder')); ?>:</b>
	<?php echo CHtml::encode($data->EndOrder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Full')); ?>:</b>
	<?php echo CHtml::encode($data->Full); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Half')); ?>:</b>
	<?php echo CHtml::encode($data->Half); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buffet')); ?>:</b>
	<?php echo CHtml::encode($data->buffet); ?>
	<br />

	*/ ?>

</div>