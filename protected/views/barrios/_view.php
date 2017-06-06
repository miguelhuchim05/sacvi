<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_BARRIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_BARRIO),array('view','id'=>$data->ID_BARRIO,'id_'=>$data->ID_LOCALIDAD)); ?>
	<br />	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LOCALIDAD')); ?>:</b>
	<?php echo CHtml::encode($data->ID_LOCALIDAD); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE); ?>
	<br />
</div>