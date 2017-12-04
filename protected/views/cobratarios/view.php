<?php 
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	$model->ID_COBRATARIO,
);

$this->menu=array(
array('label'=>'Listar cobratarios','url'=>array('index')),
array('label'=>'Crear cobratario','url'=>array('create')),
array('label'=>'Actualizar cobratario actual','url'=>array('update','id'=>$model->ID_COBRATARIO)),
array('label'=>'Eliminar Ccobratario actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_COBRATARIO),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar cobratarios','url'=>array('admin')),
);
?>

<h3 class="page-header">Ver Cobratario #<?php echo $model->ID_COBRATARIO; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_COBRATARIO',
		'NOMBRE',
		'DIRECCION',
		'TELEFONO',
		'CELULAR',
		'FECHA_INGRESO',
		'SUELDO',
),
)); ?>
