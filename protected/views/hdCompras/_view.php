<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_COMPRA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_COMPRA),array('view','id'=>$data->ID_COMPRA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PROVEEDOR')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PROVEEDOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_FACTURA')); ?>:</b>
	<?php echo CHtml::encode($data->NO_FACTURA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLAZO_LIQUIDACION')); ?>:</b>
	<?php echo CHtml::encode($data->PLAZO_LIQUIDACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA_ELABORACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->IMPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALDO')); ?>:</b>
	<?php echo CHtml::encode($data->SALDO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTATUS_PAGO')); ?>:</b>
	<?php echo CHtml::encode($data->ESTATUS_PAGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APLICADA')); ?>:</b>
	<?php echo CHtml::encode($data->APLICADA); ?>
	<br />

	*/ ?>

</div>