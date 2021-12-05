<?php
/* @var $this FoodcatController */
/* @var $data FOODCAT */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FoodID')); ?>:</b>
	<?php echo CHtml::encode($data->FoodID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CatID')); ?>:</b>
	<?php echo CHtml::encode($data->CatID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Addon')); ?>:</b>
	<?php echo CHtml::encode($data->Addon); ?>
	<br />


</div>