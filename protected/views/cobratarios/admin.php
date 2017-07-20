<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar cobratarios','url'=>array('index')),
array('label'=>'Crear Cobratario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cobratarios-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<h3 class="page-header">Administración de cobratarios</h3>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'cobratarios-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'responsiveTable'=>true,
'summaryText'=>'Mostrar {start}-{end} de {count} resultados',
'columns'=>array(		
		array('name'=>'ID_COBRATARIO', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 80px')),
		'NOMBRE',
		'DIRECCION',
		'TELEFONO',
		'CELULAR',
		'FECHA_INGRESO',
		/*
		'SUELDO',
		*/
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
