<?php
$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->ID_ARTICULO=>array('view','id'=>$model->ID_ARTICULO),
	'Update',
);

	$this->menu=array(
	array('label'=>'Listar articulos','url'=>array('index')),
	array('label'=>'Crear articulo','url'=>array('create')),
	array('label'=>'Ver articulo','url'=>array('view','id'=>$model->ID_ARTICULO)),
	array('label'=>'Administrar articulos','url'=>array('admin')),
	);
	?>

	<h3 class="page-header">Actualizar articulo #<?php echo $model->ID_ARTICULO; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>