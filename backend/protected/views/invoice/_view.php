<?php
/* @var $this InvoiceController */
/* @var $data INVOICE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OrderNo')); ?>:</b>
	<?php echo CHtml::encode($data->OrderNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InvoiceAmount')); ?>:</b>
	<?php echo CHtml::encode($data->InvoiceAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Discount')); ?>:</b>
	<?php echo CHtml::encode($data->Discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActualAmount')); ?>:</b>
	<?php echo CHtml::encode($data->ActualAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Remark')); ?>:</b>
	<?php echo CHtml::encode($data->Remark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ServiceCharge')); ?>:</b>
	<?php echo CHtml::encode($data->ServiceCharge); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('StaffCode')); ?>:</b>
	<?php echo CHtml::encode($data->StaffCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedOn')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatetime')); ?>:</b>
	<?php echo CHtml::encode($data->updatetime); ?>
	<br />

	*/ ?>

</div>