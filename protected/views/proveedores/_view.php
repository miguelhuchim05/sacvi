<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PROVEEDOR),array('view','id'=>$data->ID_PROVEEDOR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RFC')); ?>:</b>
	<?php echo CHtml::encode($data->RFC); ?>
	<br />


</div>