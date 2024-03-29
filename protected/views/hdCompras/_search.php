<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'inline',
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'ID_COMPRA',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ID_PROVEEDOR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'NO_FACTURA',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>

		<?php echo $form->textFieldGroup($model,'PLAZO_LIQUIDACION',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->datePickerGroup($model,'FECHA_RECEPCION',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

		<?php echo $form->textFieldGroup($model,'IMPORTE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'SALDO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'ESTATUS_PAGO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>

		<?php echo $form->textFieldGroup($model,'APLICADA',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1)))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
