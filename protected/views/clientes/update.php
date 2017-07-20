<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE=>array('view','id'=>$model->ID_CLIENTE),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar clientes','url'=>array('index')),
	array('label'=>'Crear cliente','url'=>array('create')),
	array('label'=>'Ver cliente','url'=>array('view','id'=>$model->ID_CLIENTE)),
	array('label'=>'Administrar clientes','url'=>array('admin')),
	);
	?>
	
	<h3 class="page-header">Actualizar cliente #<?php echo $model->ID_CLIENTE; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>