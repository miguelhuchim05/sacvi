<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->ID_USUARIO=>array('view','id'=>$model->ID_USUARIO),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Create Usuarios','url'=>array('create')),
	array('label'=>'View Usuarios','url'=>array('view','id'=>$model->ID_USUARIO)),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
	);
	?>

	<h1>Update Usuarios <?php echo $model->ID_USUARIO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>