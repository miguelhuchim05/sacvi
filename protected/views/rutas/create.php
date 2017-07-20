<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar rutas','url'=>array('index')),
array('label'=>'Administrar rutas','url'=>array('admin')),
);
?>

<h3 class="page-header">Create Rutas</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>