<?php
/* @var $this LicenseController */
/* @var $data LICENSE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LicenseCode')); ?>:</b>
	<?php echo CHtml::encode($data->LicenseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Number')); ?>:</b>
	<?php echo CHtml::encode($data->Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Addon')); ?>:</b>
	<?php echo CHtml::encode($data->Addon); ?>
	<br />


</div>