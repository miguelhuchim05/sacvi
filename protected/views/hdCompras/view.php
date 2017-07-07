<?php
$status = ($model->ESTATUS_PAGO === "PAGADA" | $model->APLICADA === "S")?false:true;
$colum=($status)?array(           
            'iDARTICULO.DESCRIPCION',
            'CANTIDAD',            
            'PR_COSTO',         
            'IMPORTE',
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    'deleteConfirmation'=>"js:'El registro '+$(this).parent().parent().children(':first-child').text()+' Será eliminado! Continuar?'",
    'afterDelete'=>'function(link,success,data){ if(success){
        $.notify("Eliminado", "success");
        $("#saldo").html("<strong>Saldo : </strong> $"+ data[0]);
    }}',
    'header' => 'Acciones',
    'htmlOptions' => array(
        'style' => 'width:90px;text-align: center;',
        ),
    'template' => '{update}{delete}',
    'buttons' => array(
        'update' => array(
            'url' => 'Yii::app()->createUrl("//dtcompras/update", array("id"=>$data->primarykey))',
            'click' => 'function(){
                var url = $(this).attr("href");
                $.post(url)
                .done(function(data){                    
                    $("input[name=\'DtCompras[ID_DTCOMPRAS]\'").val(data.ID_DTCOMPRAS);
                    $("input[name=\'DtCompras[ID_COMPRA]\'").val(data.ID_COMPRA);
                    $("select[name=\'DtCompras[ID_ARTICULO]\'").val(data.ID_ARTICULO);
                    $("input[name=\'DtCompras[CANTIDAD]\'").val(data.CANTIDAD);
                    $("input[name=\'DtCompras[PR_COSTO]\'").val(data.PR_COSTO);
                    $("input[name=\'DtCompras[IMPORTE]\'").val(data.IMPORTE);
                });
            }',
            'options' => array(
                'id' => 'action-buttons',
                'data-toggle' => 'modal',
                'data-target' => '#modalNew',                
            ),//fin options modal
            ),
        'delete' => array(
            'url' => 'Yii::app()->createUrl("//dtcompras/delete", array("id"=>$data->primarykey))',
            'options' => array(
                'id' => 'action-buttons',                
                ),
            ),
        ),    
    ),
    ):array(           
            'iDARTICULO.DESCRIPCION',
            'CANTIDAD',            
            'PR_COSTO',         
            'IMPORTE',)
;
$this->menu=array(
array('label'=>'List HdCompras','url'=>array('index')),
array('label'=>'Create HdCompras','url'=>array('create')),
array('label'=>'Update HdCompras','url'=>array('update','id'=>$model->ID_COMPRA)),
array('label'=>'Delete HdCompras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_COMPRA),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage HdCompras','url'=>array('admin')),
);
if($status)Yii::app()->clientScript->registerScript('emptymodal', "
$('#agregarbutton').click(function(){
    $('input[name=\'DtCompras[ID_DTCOMPRAS]\'').removeAttr('value');    
    $('select[name=\'DtCompras[ID_ARTICULO]\'').val(null);
    $('input[name=\'DtCompras[CANTIDAD]\'').val(null);
    $('input[name=\'DtCompras[PR_COSTO]\'').val(null);
    $('input[name=\'DtCompras[IMPORTE]\'').val(null);
});
");
?>
<h3>Detalles de compra #<?php echo $model->ID_COMPRA; ?></h3>
<div class="row text-center contact-info">
     <div class="col-lg-12 col-md-12 col-sm-12">
         <hr>
         <h5><b><?php echo $model->iDPROVEEDOR->NOMBRE; ?></b></h5>
         <span>
             <strong>Estatus: </strong>             
             <?php
             $context = ($model->ESTATUS_PAGO == "PAGADA")?"info":"warning";
             $label = $model->ESTATUS_PAGO;
             $this->widget('booster.widgets.TbLabel', compact('context', 'label'));
             ?>             
         </span>
         <span>
             <strong>No. Factura : </strong><?php echo $model->NO_FACTURA; ?>
         </span>         
          <span>
             <strong>Fecha : </strong><?php echo $model->FECHA; ?>
         </span>
         <span id="saldo">
             <strong>Saldo : </strong>$<?php echo $model->SALDO; ?>
         </span>         
         <hr>
     </div>
</div>

<div class="row">
    <?php if($status)$this->widget(
        'booster.widgets.TbButton',
        array(
            'label' => 'Agregar',
            'context' => 'success',            
            'htmlOptions' => array(
                'id' => 'agregarbutton',                
                'data-toggle' => 'modal',
                'data-target' => '#modalNew',
                'class' => 'pull-right',
                ),
            )
        )
    ?>    
    <?php $this->widget('booster.widgets.TbExtendedGridView',array(
    'id'=>'dt-compras-grid',
    'type' => 'striped bordered condensed',
    'dataProvider'=>$modeldtFilter,
    'template' => "{items}{extendedSummary}",
    'columns'=>$colum,
    'extendedSummary' => array(
           'title' => 'Suma de importes',
           'columns' => array(
               'IMPORTE' => array('label'=>'Importe total', 'class'=>'TbSumOperation')
           )
       ),
    'extendedSummaryOptions' => array(
            'class' => 'well pull-right',
            'style' => 'width:300px',
        ),  
    )); ?>
</div>
<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'modalNew')
); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal"></a>
    <h4>Modal header</h4>
</div>
<div class="modal-body">
    <?php if($status)$this->renderPartial('../dtcompras/_addArticulo',array(
        'model'=>$modeldt,
    )); ?>
</div>
<?php $this->endWidget();?>
