<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Cobratarios','url'=>array('index')),
array('label'=>'Manage Cobratarios','url'=>array('admin')),
);
?>

<h1>Create Cobratarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>