<?php 
$aplicada = ($model->APLICADA === "S")?FALSE:TRUE;
$estadoarray = empty($modelacFilter->getData())?TRUE:FALSE;
$pagada = ($model->ESTATUS_PAGO === "PAGADA")?FALSE:TRUE; // valor falso si esta pagado... para no generar boton
$this->menu=array(
array('label'=>'Listar compras','url'=>array('index')),
array('label'=>'Crear compra','url'=>array('create')),
array('label'=>'Actualizar compra actual','url'=>array('update','id'=>$model->ID_COMPRA)),
array('label'=>'Eliminar compra actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_COMPRA),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar compras','url'=>array('admin')),
);
?>
<h3>Abonos de compra #<?php echo $model->ID_COMPRA; ?></h3>
<div class="row text-center contact-info">
     <div class="col-lg-12 col-md-12 col-sm-12">
         <hr>
         <h5><b><?php echo $model->iDPROVEEDOR->NOMBRE; ?></b></h5>         
         <span id="estatus">
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
             <strong>Fecha : </strong><?php echo $model->FECHA_ELABORACION; ?>
         </span>
         <span id="saldo">
             <strong>Saldo : </strong>$<?php echo $model->SALDO; ?>
         </span>         
         <hr>
     </div>
</div>

<?php if($aplicada){?>
<div class="alert alert-warning">
  <strong>Alerta!</strong> Está compra aun no se encuentra aplicada.
</div>
<div class="alert alert-info">
  <strong>Información!</strong> Para poder realizar los abonos debera aplicar la compra.
</div>
<?php }?>
<?php if($estadoarray & !$aplicada & $pagada){?>
<div id="div1" class="row">
    <div class="text-center pad-5">
        <?php
        $this->widget(
            'booster.widgets.TbButton',
            array(
                'label' => 'Generar pagos',
                'context' => 'primary',
                'size' => 'large',
                'buttonType' => "ajaxLink",
                'url' => array('//abonosCompras/create'),
                'ajaxOptions' => array(
                    'type' => 'POST',
                    'data' => $model->attributes,
                    'success' => 'function(data){
                        $.fn.yiiGridView.update(\'abonos-compras-grid\');
                        $("#div1").remove();
                    }',
                    ),
            )
        );
        ?>
    </div>    
</div>
<?php }?>
<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'abonos-compras-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelacFilter,
'template' => "{items}",
'columns'=>array(        
        'NO_ABONO',
        'FECHA',
        array('name'=>'IMPORTE', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->IMPORTE, "MXN")'),
        'STATUS',
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'header' => 'Acciones',
            'htmlOptions' => array('style'=>'width:15%;text-align: center;'),
            'template'=>'{abonar}',            
            'buttons' => array(
                'abonar' => array(                    
                    'label' => 'Aplicar abono',
                    'visible' => '$data->STATUS!="PAGADA"',
                    'url' => 'Yii::app()->createUrl("//abonosCompras/aply", array("id"=>$data->primaryKey))',
                    'click' =>"function(){
                        $.fn.yiiGridView.update('abonos-compras-grid', {
                            type:'post',
                            url:$(this).attr('href'),                            
                            success:function(data){                                
                                $.fn.yiiGridView.update('abonos-compras-grid');
                                $('#saldo').html('<strong>Saldo : </strong> $' + data.SALDO);
                                if(data.SALDO == 0)                                    
                                    $('#estatus span').attr('class', 'label label-info').html('PAGADA');
                            }
                        })
                        return false;
                    }",
                    'options' => array(
                        'class' => 'btn btn-success btn-xs',                        
                        ),
                    ),
                ),
            ),
),
)); ?>
