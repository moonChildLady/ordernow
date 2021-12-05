<?php
/* @var $this TablestatusController */
/* @var $data TABLESTATUS */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TableID')); ?>:</b>
	<?php echo CHtml::encode($data->TableID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OrderNo')); ?>:</b>
	<?php echo CHtml::encode($data->OrderNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumberOfSeat')); ?>:</b>
	<?php echo CHtml::encode($data->NumberOfSeat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedOn')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastOrder')); ?>:</b>
	<?php echo CHtml::encode($data->LastOrder); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ExpiredOn')); ?>:</b>
	<?php echo CHtml::encode($data->ExpiredOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	*/ ?>

</div>