<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->ID_PROVEEDOR,
);

$this->menu=array(
array('label'=>'List Proveedores','url'=>array('index')),
array('label'=>'Create Proveedores','url'=>array('create')),
array('label'=>'Update Proveedores','url'=>array('update','id'=>$model->ID_PROVEEDOR)),
array('label'=>'Delete Proveedores','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PROVEEDOR),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Proveedores','url'=>array('admin')),
);
?>

<h1>View Proveedores #<?php echo $model->ID_PROVEEDOR; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_PROVEEDOR',
		'NOMBRE',
		'RFC',
),
)); ?>
