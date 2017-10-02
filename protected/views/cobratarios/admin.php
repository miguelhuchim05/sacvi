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
<div align="right"> <!--pager-->
	<?php 
	$this->widget('ext.PageSize.EPageSize', array(
	'gridViewId' => 'cobratarios-grid',
	'beforeLabel' => 'Seleccionar cantidad: ',
    'pageSize' => Yii::app()->request->getParam('pageSize',null),
    'defaultPageSize' =>  10 ,
    'pageSizeOptions'=> array(5=>5, 10=>10, 20=>20, 30=>30, 40=>40, 50=>50, 75=>75, 100=>100),
    ));

    $dataProvider = $model->search();
    $pageSize = Yii::app()->user->getState('pageSize',10);
    $dataProvider->getPagination()->setPageSize($pageSize);
    ?>
</div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'cobratarios-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$dataProvider,
'filter'=>$model,
'responsiveTable'=>true,
'summaryText'=>'Mostrar {start}-{end} de {count} resultados',
'columns'=>array(
		'NOMBRE',
		'DIRECCION',
		'TELEFONO',
		'CELULAR',
		'FECHA_INGRESO',
		'SUELDO',
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
