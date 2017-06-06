<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Localidades','url'=>array('index')),
array('label'=>'Create Localidades','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('localidades-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Localidades</h1>

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

<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'localidades-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'responsiveTable'=>true,
'columns'=>array(		
		array('name'=>'ID_LOCALIDAD', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 80px')),
		'NOMBRE',
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'header'=>'Barrio',
			'htmlOptions' => array('style'=>'width:20%'),			
			'template'=>'{agregarBarrio}{verBarrios}',
			'buttons'=>array(
				'agregarBarrio' => array(
					'label' => 'Agregar barrio',
					'url' => 'Yii::app()->createUrl("barrios/create", array("id"=>$data->ID_LOCALIDAD))',
					'options'=>array(
						'class'=>'btn-pad btn btn-success btn-xs'),
				),//fin de agregarBarrio
				'verBarrios' => array(
					'label' => 'Ver barrios',
					'url' => 'Yii::app()->createUrl("barrios/admin", array("id"=>$data->ID_LOCALIDAD))',
					'options'=>array(
						'class'=>'btn-pad btn btn-success btn-xs'),					
				),//fin de agregarBarrio
			),//fin de buttons
			),
		array(
		'class'=>'booster.widgets.TbButtonColumn',
		'header'=>'Acciones',
		),
),//fin de columns
)); ?>