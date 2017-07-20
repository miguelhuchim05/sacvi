<?php
$this->breadcrumbs=array(
	'Abonos Comprases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List AbonosCompras','url'=>array('index')),
array('label'=>'Manage AbonosCompras','url'=>array('admin')),
);
?>

<h1>Create AbonosCompras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>