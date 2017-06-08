<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE=>array('view','id'=>$model->ID_CLIENTE),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Clientes','url'=>array('index')),
	array('label'=>'Create Clientes','url'=>array('create')),
	array('label'=>'View Clientes','url'=>array('view','id'=>$model->ID_CLIENTE)),
	array('label'=>'Manage Clientes','url'=>array('admin')),
	);
	?>

	<h1>Update Clientes <?php echo $model->ID_CLIENTE; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>