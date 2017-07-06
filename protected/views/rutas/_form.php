<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rutas-form',
	'type' => 'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'NOMBRE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php
	//paso 1 obtener lista
	$models = cobratarios::model()->findAll();
	//paso 2 se crea arreglo list data
	$list = CHtml::listData($models, 
                'ID_COBRATARIO', 'NOMBRE');
	//PASO 3 se crea el dropdownlist
	echo $form->dropDownListGroup(
			$model,
			'ID_COBRATARIO',
			array(
				/*'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),*/
				'widgetOptions' => array(
					'data' => $list,
					'htmlOptions' => array('empty' => 'Seleccionar cobratario'),
				)
			)
		);
	?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
