<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ABONO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_ABONO),array('view','id'=>$data->ID_ABONO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_COMPRA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_COMPRA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NO_ABONO')); ?>:</b>
	<?php echo CHtml::encode($data->NO_ABONO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA')); ?>:</b>
	<?php echo CHtml::encode($data->FECHA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->IMPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>