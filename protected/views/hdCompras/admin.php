<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List HdCompras','url'=>array('index')),
array('label'=>'Create HdCompras','url'=>array('create')),
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

<h1>Manage Hd Comprases</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
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
'columns'=>array(		
		array('name'=>'ID_COMPRA', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 80px')),
		'iDPROVEEDOR.NOMBRE',
		'NO_FACTURA',
		//'PLAZO_LIQUIDACION',
		'FECHA',
		array('name'=>'IMPORTE', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->IMPORTE, "MXN")'),
		array('name'=>'SALDO', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->SALDO, "MXN")'),
		'ESTATUS_PAGO',
		'APLICADA',
array(
'class'=>'booster.widgets.TbButtonColumn',
'header' => "Acciones",
),
),
)); ?>
