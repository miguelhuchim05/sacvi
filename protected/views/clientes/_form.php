<?php
if(!$model->isNewRecord){
	Yii::app()->clientScript->registerScript('select', "		
	$('#Clientes_ID_LOCALIDAD').ready(function(){
	    $('select[name=\'Clientes[ID_LOCALIDAD]\'').trigger('change');	    
	});
	");
}
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'clientes-form',
	'type' => 'horizontal',
	'enableClientValidation'=>true,
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>	

	<?php echo $form->textFieldGroup($model,'NOMBRE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>
	
	<?php /*echo $form->textFieldGroup($model,'ID_LOCALIDAD',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));*/ ?>
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

	<?php /*echo $form->textFieldGroup($model,'ID_BARRIO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));*/ ?>
	<?php
	/*//paso 1 obtener lista
	$models = Localidades::model()->findAll();
	//paso 2 se crea arreglo list data
	$list = CHtml::listData($models, 
                'ID_LOCALIDAD', 'NOMBRE');*/
	//PASO 3 se crea el dropdownlist
	echo $form->dropDownListGroup(
			$model,
			'ID_BARRIO',array()
		);
	?>

	<?php echo $form->textFieldGroup($model,'DIRECCION',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php echo $form->textFieldGroup($model,'SALDO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'EFECTIVIDAD',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<!-- ID_VENTA,ID_CLIENTE,ID_COBRATARIO AS ID_RUTA,FOLIO_VENTA,FECHA_VENTA,NO_PAGOS,PAGO_INICIAL,ABONOS,SUBTOTAL,DESCUENTO,TOTAL,FECHA_1ERPAGO,FORMA_PAGO,SALDO,PAGOS_RESTANTES,FECHA_ULTABONO,FECHA_LIQUIDACION,ESTATUS,OBSERVACIONES,APLICADA,IMPORTE_LETRAS,PENDIENTES,EFECTIVIDAD,SIGCREDITO,CREDITOANT,ESTATUS_ABONO -->