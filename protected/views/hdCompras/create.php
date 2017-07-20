<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar compras','url'=>array('index')),
array('label'=>'Admnistrar compras','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>