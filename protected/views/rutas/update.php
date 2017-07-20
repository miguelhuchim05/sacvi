<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	$model->ID_RUTA=>array('view','id'=>$model->ID_RUTA),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar rutas','url'=>array('index')),
	array('label'=>'Crear ruta','url'=>array('create')),
	array('label'=>'Ver ruta','url'=>array('view','id'=>$model->ID_RUTA)),
	array('label'=>'Administrar rutas','url'=>array('admin')),
	);
	?>

	<h3 class="page-header">Actualizar Ruta #<?php echo $model->ID_RUTA; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>