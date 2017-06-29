<?php
$this->breadcrumbs=array(
	'Dt Comprases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DtCompras','url'=>array('index')),
array('label'=>'Manage DtCompras','url'=>array('admin')),
);
?>

<h1>Create DtCompras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>