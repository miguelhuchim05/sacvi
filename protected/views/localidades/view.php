<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID_LOCALIDAD,
);

$this->menu=array(
array('label'=>'Listar localidades','url'=>array('index')),
array('label'=>'Crear Localidad','url'=>array('create')),
array('label'=>'Actualizar Localidad actual','url'=>array('update','id'=>$model->ID_LOCALIDAD)),
array('label'=>'Eliminar Localidad actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LOCALIDAD),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar localidades','url'=>array('admin')),
);
?>

<h3 class="page-header">Ver Localidad #<?php echo $model->ID_LOCALIDAD; ?></h3>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_LOCALIDAD',
		'NOMBRE',
),
)); ?>
