<?php 
$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar articulos','url'=>array('index')),
array('label'=>'Administrar articulos','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear Articulo</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>