<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	$model->ID_COMPRA=>array('view','id'=>$model->ID_COMPRA),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar compras','url'=>array('index')),
	array('label'=>'Crear compra','url'=>array('create')),
	array('label'=>'Ver compra','url'=>array('view','id'=>$model->ID_COMPRA)),
	array('label'=>'Administar compras','url'=>array('admin')),
	);
	?>

	<h3 class="page-header">Actualizar compra #<?php echo $model->ID_COMPRA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>