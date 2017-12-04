<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array( 
	'id'=>'articulos-form',
	'type' => 'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'DESCRIPCION',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php echo $form->textFieldGroup($model,'MODELO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>

	<?php echo $form->textFieldGroup($model,'MARCA',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>

	<?php echo $form->textFieldGroup($model,'COLOR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'PR_COSTO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php 
		echo $form->textFieldGroup
		(
			$model,
			'PORCENT_UTILIDAD',
			array
			(
				'widgetOptions'=>array
				(
					'htmlOptions'=>array
					(
						'class'=>'span5',
						'ajax' => array
						(
							'type' => 'POST',
							'dataType'=>'json',
							'url' => CController::createUrl('articulos/getPrecio'),
							'success' =>"function(data) {
								$('#Articulos_PR_VENTA').val(data.precio);  
							  }"
						)
					)
				)
			)
		); 
	?>

	<?php 
		echo $form->textFieldGroup
		(
			$model,
			'PR_VENTA',
			array
			(
				'widgetOptions'=>array
				(
					'htmlOptions'=>array
					(
						
						'class' => 'span5',
						'readonly' => 'readonly'
					)
				)
			)
		); 
	?>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
