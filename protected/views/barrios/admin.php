<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Localidades','url'=>array('localidades/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('barrios-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Barrios</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbExtendedGridView',array(
'id'=>'barrios-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'responsiveTable'=>true,
'columns'=>array(
		'ID_BARRIO',
		'iDLOCALIDAD.NOMBRE',
		'NOMBRE',
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
'viewButtonUrl'=>'Yii::app()->createUrl("barrios/view",array("id"=>$data->ID_BARRIO, "id_"=>$data->ID_LOCALIDAD))',
'updateButtonUrl'=>'Yii::app()->createUrl("barrios/update",array("id"=>$data->ID_BARRIO, "id_"=>$data->ID_LOCALIDAD))',
'deleteButtonUrl'=>'Yii::app()->createUrl("barrios/delete",array("id"=>$data->ID_BARRIO, "id_"=>$data->ID_LOCALIDAD))',
),
),
)); ?> 