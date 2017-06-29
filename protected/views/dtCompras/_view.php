<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_DTCOMPRAS')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_DTCOMPRAS),array('view','id'=>$data->ID_DTCOMPRAS)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_COMPRA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_COMPRA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ARTICULO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ARTICULO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CANTIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->CANTIDAD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PR_COSTO')); ?>:</b>
	<?php echo CHtml::encode($data->PR_COSTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->IMPORTE); ?>
	<br />


</div>