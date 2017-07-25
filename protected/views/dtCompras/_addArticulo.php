<?php
Yii::app()->clientScript->registerScript('calculador', "
/*operaciones automaticas*/
function cImporte(){    
    var a = $('#DtCompras_CANTIDAD').val();
    var b = $('#DtCompras_PR_COSTO').val();
    var r = a * b;
    $('#DtCompras_IMPORTE').val(r);
}
$('#DtCompras_PR_COSTO').change(function(){
    cImporte();
});
$('#DtCompras_CANTIDAD').change(function(){
    cImporte();
});
");
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl('//dtCompras/recordCU'),
	'type' => 'horizontal',	
	'enableClientValidation'=>true,
	'clientOptions'=>array(
        'validateOnSubmit'=>true, // Required to perform AJAX validation on form submit
        'afterValidate'=>'js:mySubmitFormFunction', // Your JS function to submit form
    ),
)); ?>

		<?php echo $form->hiddenField($model,'ID_DTCOMPRAS')?>
		<?php echo $form->hiddenField($model,'ID_COMPRA')?>

		<?php	
		$models = Articulos::model()->findAll();		
		$list = CHtml::listData($models, 
	                'ID_ARTICULO', 'DESCRIPCION');		
		echo $form->dropDownListGroup(
				$model,
				'ID_ARTICULO',
				array(					
					'widgetOptions' => array(
						'data' => $list,
						'htmlOptions' => array('empty' => 'Seleccionar articulo'),
					)
				)
			);
		?>

		<?php echo $form->textFieldGroup($model,'CANTIDAD',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'PR_COSTO',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'IMPORTE',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="modal-footer">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			//'label'=>'Enviar',
			'label'=>$model->isNewRecord ? 'Enviar' : 'Actualizar',
		)); ?>
		<?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'label' => 'Cerrar',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        );?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
	function mySubmitFormFunction(form, data, hasError){
	    if (!hasError){	        
	        $.post(form.attr('action'), form.serialize(), function(res){
	            // Do stuff with your response data!	            
	            $.notify(res[0],'info');
	            if (res.result)	                
	                console.log(res.data);
	            $('#modalNew').modal('toggle');
	            $('#saldo').html('<strong>Saldo : </strong> $'+ res[1]);
	            $.fn.yiiGridView.update('dt-compras-grid');
	        })
	        .fail(function() {
	            $.notify("Error",'error');
	        });
	    }
	    // Always return false so that Yii will never do a traditional form submit	    
	    return false;
	}
</script>