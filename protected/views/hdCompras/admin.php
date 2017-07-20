<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar compras','url'=>array('index')),
array('label'=>'Crear compra','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('hd-compras-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h3 class="page-header">Administración de compras a proveedores</h3>
<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'hd-compras-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'responsiveTable'=>true,
'summaryText'=>'Mostrar {start}-{end} de {count} resultados',
'columns'=>array(		
		//array('name'=>'ID_COMPRA', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 70px')),		
		array('name'=>'iDPROVEEDOR.NOMBRE', 'header' => 'Proveedor'),
		'NO_FACTURA',
		'PLAZO_LIQUIDACION',
		'FECHA_ELABORACION',
		'FECHA_RECEPCION',
		array('name'=>'IMPORTE', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->IMPORTE, "MXN")'),
		array('name'=>'SALDO', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->SALDO, "MXN")'),		
		array('name'=>'ESTATUS_PAGO',
			'headerHtmlOptions' => array('style' => 'width: 100px'),
			'filter'=> array('PAGADA' => 'Pagado','CREDITO' => 'Credito'),
			),
		//'APLICADA',
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'APLICADA',
			'headerHtmlOptions' => array('style' => 'width: 115px'),
			'filter' => array('S'=>'Aplicada','N'=>'No apli...'),
			'editable' => array(				
				'type' => 'select',
				'title' => 'Aplicar',
				'url' => array('aplicar'),
				'source'=> array('S'=>'Aplicada','N'=>'No aplicada'),
				'options'  => array(    //custom display 					
                     'display' => 'js: function(value, sourceData) {
                          var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                              colors = {N: "gray", S: "blue"};
                          $(this).text(selected[0].text).css("color", colors[value]);    
                      }'
                  ),//fin options
				),
			),
array(
'class'=>'booster.widgets.TbButtonColumn',
'header'=>'Acciones',
'deleteConfirmation'=>"js:'El registro #'+$(this).parent().parent().children(':first-child').text()+' Será eliminado! Continuar?'",
    'afterDelete'=>'function(link,success,data){ if(success) $.notify("Eliminado", "info");}',
'htmlOptions' => array(
        'style' => 'width:110px;text-align: center;',
        ),
'buttons' => array(
	'view' => array(
		'options' => array(
                'id' => 'action-buttons',
                ),
		),
	'update' => array(
		'options' => array(
                'id' => 'action-buttons',
                ),
		),
	'delete' => array(
		'options' => array(
                'id' => 'action-buttons',
                ),
		),
	),
),
),
)); ?>
