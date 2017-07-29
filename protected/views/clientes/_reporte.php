<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'clientes-form',
	'type' => 'inline',
	'htmlOptions' => array('target' => '_blanck'), // for inset effect
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<?php
	//paso 1 obtener lista
	$models = Localidades::model()->findAll();
	//paso 2 se crea arreglo list data
	$list = CHtml::listData($models, 
                'ID_LOCALIDAD', 'NOMBRE');
	//PASO 3 se crea el dropdownlist
	echo $form->dropDownListGroup(
			$model,
			'ID_LOCALIDAD',
			array(
				/*'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),*/
				'widgetOptions' => array(
					'data' => $list,
					//'htmlOptions' => array('empty' => 'Seleccionar cobratario'),
					'htmlOptions' => array(
						'ajax' => array(
							'type' => 'POST',
							'url' => CController::createUrl('clientes/getBarrios'),
							'update' => '#'.CHtml::activeId($model,'ID_BARRIO'),
						),//fin de ajax
						'empty' => 'Seleccionar cobratario',
					),//fin de options
				)
			)
		);
	?>

	<?php	
	echo $form->dropDownListGroup(
			$model,
			'ID_BARRIO',array(
				'widgetOptions' => array(
					'htmlOptions' => array(
						'empty' => 'Seleccionar barrio',
						),
					),
				)
		);
	?>
	
	<?php echo $form->textFieldGroup($model,'SALDO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=> 'Generar',
		)); ?>
</div>

<?php $this->endWidget(); ?>