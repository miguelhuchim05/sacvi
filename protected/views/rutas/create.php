<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Rutas','url'=>array('index')),
array('label'=>'Manage Rutas','url'=>array('admin')),
);
?>

<h1>Create Rutas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>