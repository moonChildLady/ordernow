<?php
/* @var $this DeviceController */
/* @var $data DEVICE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uuid')); ?>:</b>
	<?php echo CHtml::encode($data->uuid); ?>
	<br />





	<b><?php echo CHtml::encode($data->getAttributeLabel('deviceType')); ?>:</b>
	<?php echo CHtml::encode($data->deviceType0->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kitchenType')); ?>:</b>
	<?php echo CHtml::encode($data->kitchenType); ?>
	<br />
<b><?php echo CHtml::encode($data->getAttributeLabel('Enable')); ?>:</b>
	<?php echo CHtml::encode(($data->Enable==1)?"NORMAL":"INVAILD"); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('Addon')); ?>:</b>
	<?php echo CHtml::encode($data->Addon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

</div>