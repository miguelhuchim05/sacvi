<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID_LOCALIDAD=>array('view','id'=>$model->ID_LOCALIDAD),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Localidades','url'=>array('index')),
	array('label'=>'Create Localidades','url'=>array('create')),
	array('label'=>'View Localidades','url'=>array('view','id'=>$model->ID_LOCALIDAD)),
	array('label'=>'Manage Localidades','url'=>array('admin')),
	);
	?>

	<h1>Update Localidades <?php echo $model->ID_LOCALIDAD; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>