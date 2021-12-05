<?php
/* @var $this TypecatController */
/* @var $data TYPECAT */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatID')); ?>:</b>
	<?php echo CHtml::encode($data->CatID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeID')); ?>:</b>
	<?php echo CHtml::encode($data->TypeID); ?>
	<br />


</div>