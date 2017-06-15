<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->ID_PROVEEDOR=>array('view','id'=>$model->ID_PROVEEDOR),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Proveedores','url'=>array('index')),
	array('label'=>'Create Proveedores','url'=>array('create')),
	array('label'=>'View Proveedores','url'=>array('view','id'=>$model->ID_PROVEEDOR)),
	array('label'=>'Manage Proveedores','url'=>array('admin')),
	);
	?>

	<h1>Update Proveedores <?php echo $model->ID_PROVEEDOR; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>