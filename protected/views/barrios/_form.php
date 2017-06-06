<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'barrios-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php 
if(isset($localidad))
$model->ID_LOCALIDAD = $localidad->ID_LOCALIDAD;
echo $form->hiddenField($model, 'ID_LOCALIDAD');
?>
<?php echo $form->textFieldGroup($model, 'NOMBRE');?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
