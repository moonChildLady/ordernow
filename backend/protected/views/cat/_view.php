<?php
/* @var $this CatController */
/* @var $data CAT */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ordering')); ?>:</b>
	<?php echo CHtml::encode($data->Ordering); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />


</div>