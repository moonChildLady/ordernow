<?php
/* @var $this TableController */
/* @var $data TABLE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeviceID')); ?>:</b>
	<?php echo CHtml::encode($data->DeviceID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TableNo')); ?>:</b>
	<?php echo CHtml::encode($data->TableNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Enable')); ?>:</b>
	<?php echo CHtml::encode(($data->Enable==1)?"NORMAL":"INVAILD"); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedOn')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedOn); ?>
	<br />


</div>