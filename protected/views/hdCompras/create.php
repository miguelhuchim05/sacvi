<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List HdCompras','url'=>array('index')),
array('label'=>'Manage HdCompras','url'=>array('admin')),
);
?>

<h1>Create HdCompras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>