<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->ID_PROVEEDOR=>array('view','id'=>$model->ID_PROVEEDOR),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar proveedores','url'=>array('index')),
	array('label'=>'Crear proveedor','url'=>array('create')),
	array('label'=>'Ver proveedor','url'=>array('view','id'=>$model->ID_PROVEEDOR)),
	array('label'=>'Administrar proveedores','url'=>array('admin')),
	);
	?>

	<h3 class="page-header">Actualizar Proveedor #<?php echo $model->ID_PROVEEDOR; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>