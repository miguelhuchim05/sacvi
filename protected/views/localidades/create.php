<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Localidades','url'=>array('index')),
array('label'=>'Manage Localidades','url'=>array('admin')),
);
?>

<h1>Create Localidades</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>