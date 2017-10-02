<div class="list-group-item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_BARRIO')); ?>:</b>
	<?php echo CHtml::encode($data->iDBARRIO->iDLOCALIDAD->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LOCALIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->iDBARRIO->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_CREACION')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_CREACION); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('SALDO')); ?>:</b>
	<?php echo CHtml::encode($data->SALDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EFECTIVIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->EFECTIVIDAD); ?>
	<br />


</div> 