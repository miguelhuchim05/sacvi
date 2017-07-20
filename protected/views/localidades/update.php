<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID_LOCALIDAD=>array('view','id'=>$model->ID_LOCALIDAD),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar localidades','url'=>array('index')),
	array('label'=>'Crear localidades','url'=>array('create')),
	array('label'=>'Ver Localidad','url'=>array('view','id'=>$model->ID_LOCALIDAD)),
	array('label'=>'Administrar Localidades','url'=>array('admin')),
	);
	?>
	
	<h3 class="page-header">Actualizar Localidad #<?php echo $model->ID_LOCALIDAD; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>