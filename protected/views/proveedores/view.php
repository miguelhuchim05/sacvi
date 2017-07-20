<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->ID_PROVEEDOR,
);

$this->menu=array(
array('label'=>'Listar proveedores','url'=>array('index')),
array('label'=>'Crear proveedor','url'=>array('create')),
array('label'=>'Actualizar proveedor actual','url'=>array('update','id'=>$model->ID_PROVEEDOR)),
array('label'=>'Eliminar proveedor actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PROVEEDOR),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar proveedores','url'=>array('admin')),
);
?>

<h3 class="page-header">Ver Proveedor #<?php echo $model->ID_PROVEEDOR; ?></h3>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_PROVEEDOR',
		'NOMBRE',
		'RFC',
),
)); ?>
