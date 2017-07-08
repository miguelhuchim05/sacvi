<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'hd-compras-form',
	'type' => 'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php /*echo $form->textFieldGroup($model,'ID_PROVEEDOR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));*/ ?>
	<?php
	$models = Proveedores::model()->findAll();
	$list = CHtml::listData($models,'ID_PROVEEDOR', 'NOMBRE');
	echo $form->dropDownListGroup(
			$model,
			'ID_PROVEEDOR',
			array(				
				'widgetOptions' => array(
					'data' => $list,
					'htmlOptions' => array('empty' => 'Seleccionar proveedor'),
				)
			)
		);
	?>

	<?php echo $form->textFieldGroup($model,'NO_FACTURA',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>	

	<?php echo $form->dropDownListGroup(
			$model,
			'PLAZO_LIQUIDACION',
			array(				
				'widgetOptions' => array(
					'data' => array('1'=>'30 días', '2'=>'60 días', '3'=>'90 días', '4'=>'120 días'),
					'htmlOptions' => array('empty' => 'Seleccionar plazo para liquidar'),
				)
			)
		); ?>

	<?php echo $form->datePickerGroup($model,'FECHA_ELABORACION',
	array('widgetOptions'=>array(
	'options'=>array(
		'language' => 'es',
		'format' => 'yyyy-mm-dd',
		'todayBtn' => true,
		),
	'htmlOptions'=>array('class'=>'span5')), 
	'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php echo $form->datePickerGroup($model,'FECHA_RECEPCION',array('widgetOptions'=>array(
	'options'=>array(
		'language' => 'es',
		'format' => 'yyyy-mm-dd',
		'todayBtn' => true,
		),
	'htmlOptions'=>array('class'=>'span5')), 
	'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
