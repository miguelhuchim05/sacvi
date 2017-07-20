<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar proveedores','url'=>array('index')),
array('label'=>'Administrar proveedores','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>