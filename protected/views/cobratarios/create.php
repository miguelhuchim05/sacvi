<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar cobratarios','url'=>array('index')),
array('label'=>'Administrar cobratarios','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear Cobratarios</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>