<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'ID_COBRATARIO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'NOMBRE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

		<?php echo $form->textFieldGroup($model,'DIRECCION',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

		<?php echo $form->textFieldGroup($model,'TELEFONO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

		<?php echo $form->textFieldGroup($model,'CELULAR',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

		<?php echo $form->datePickerGroup($model,'FECHA_INGRESO',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

		<?php echo $form->textFieldGroup($model,'SUELDO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
