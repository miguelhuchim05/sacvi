<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar localidades','url'=>array('index')),
array('label'=>'Administrar localidades','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear localidad</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>