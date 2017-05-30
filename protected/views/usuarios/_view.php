<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USUARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_USUARIO),array('view','id'=>$data->ID_USUARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FULL_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->FULL_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->USER_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD_')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CELULAR')); ?>:</b>
	<?php echo CHtml::encode($data->CELULAR); ?>
	<br />


</div>