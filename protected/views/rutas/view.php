<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	$model->ID_RUTA,
);

$this->menu=array(
array('label'=>'Listar rutas','url'=>array('index')),
array('label'=>'Crear ruta','url'=>array('create')),
array('label'=>'Actualizar ruta actual','url'=>array('update','id'=>$model->ID_RUTA)),
array('label'=>'Eliminar ruta actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_RUTA),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar rutas','url'=>array('admin')),
);
?>

<h3 class="page-header">View Rutas #<?php echo $model->ID_RUTA; ?></h3>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_RUTA',
		'NOMBRE',		
		array(
			'label'=>'Cobratario',
			'name'=>'iDCOBRATARIO.NOMBRE',
			),
),
)); ?>
