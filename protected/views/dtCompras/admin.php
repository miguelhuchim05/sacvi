<?php
$this->breadcrumbs=array(
	'Dt Comprases'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List DtCompras','url'=>array('index')),
array('label'=>'Create DtCompras','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('dt-compras-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Dt Comprases</h1>

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
'id'=>'dt-compras-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'responsiveTable'=>true,
'columns'=>array(		
		array('name'=>'ID_DTCOMPRAS', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 80px')),
		'ID_COMPRA',
		'ID_ARTICULO',
		'CANTIDAD',
		'PR_COSTO',
		'IMPORTE',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
