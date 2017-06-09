<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_RUTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_RUTA),array('view','id'=>$data->ID_RUTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_COBRATARIO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_COBRATARIO); ?>
	<br />


</div>