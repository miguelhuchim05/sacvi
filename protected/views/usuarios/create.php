<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar usuarios','url'=>array('index')),
array('label'=>'Administrar usuarios','url'=>array('admin')),
);
?>

<h3 class="page-header">Crear usuario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>