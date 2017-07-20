<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar clientes','url'=>array('index')),
array('label'=>'Administrar clientes','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear cliente</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>