<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'type' => 'inline',
	'htmlOptions' => array('class' => 'well'), // for inset effect
	'method'=>'get',
)); ?>

		<?php /*echo $form->textFieldGroup($model,'ID_LOCALIDAD',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));*/ ?>

		<?php echo $form->textFieldGroup($model,'NOMBRE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
