<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_COBRATARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_COBRATARIO),array('view','id'=>$data->ID_COBRATARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONO')); ?>:</b>
	<?php echo CHtml::encode($data->TELEFONO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CELULAR')); ?>:</b>
	<?php echo CHtml::encode($data->CELULAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_INGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_INGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUELDO')); ?>:</b>
	<?php echo CHtml::encode($data->SUELDO); ?>
	<br />


</div>