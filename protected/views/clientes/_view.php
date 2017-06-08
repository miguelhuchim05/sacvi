<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CLIENTE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CLIENTE),array('view','id'=>$data->ID_CLIENTE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_BARRIO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_BARRIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LOCALIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->ID_LOCALIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALDO')); ?>:</b>
	<?php echo CHtml::encode($data->SALDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EFECTIVIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->EFECTIVIDAD); ?>
	<br />


</div>