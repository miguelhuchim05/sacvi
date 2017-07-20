<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	$model->ID_COBRATARIO=>array('view','id'=>$model->ID_COBRATARIO),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar cobratarios','url'=>array('index')),
	array('label'=>'Crear cobratario','url'=>array('create')),
	array('label'=>'Ver cobratario','url'=>array('view','id'=>$model->ID_COBRATARIO)),
	array('label'=>'Administrar cobratarios','url'=>array('admin')),
	);
	?>

	<h3 class="page-header">Actualizar Cobratario #<?php echo $model->ID_COBRATARIO; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>