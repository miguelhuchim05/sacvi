<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE,
);

$this->menu=array(
array('label'=>'Listar clientes','url'=>array('index')),
array('label'=>'Crear cliente','url'=>array('create')),
array('label'=>'Actualizar cliente  actual','url'=>array('update','id'=>$model->ID_CLIENTE)),
array('label'=>'Eliminar cliente actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CLIENTE),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>
<h3 class="page-header">Ver Cliente #<?php echo $model->ID_CLIENTE; ?></h3>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_CLIENTE',
		'ID_BARRIO',
		'ID_LOCALIDAD',
		'NOMBRE',
		'DIRECCION',
		'FECHA_CREACION',
		'SALDO',
		'EFECTIVIDAD',
),
)); ?>
