<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	$model->ID_RUTA=>array('view','id'=>$model->ID_RUTA),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Rutas','url'=>array('index')),
	array('label'=>'Create Rutas','url'=>array('create')),
	array('label'=>'View Rutas','url'=>array('view','id'=>$model->ID_RUTA)),
	array('label'=>'Manage Rutas','url'=>array('admin')),
	);
	?>

	<h1>Update Rutas <?php echo $model->ID_RUTA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>