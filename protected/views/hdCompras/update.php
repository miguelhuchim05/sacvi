<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	$model->ID_COMPRA=>array('view','id'=>$model->ID_COMPRA),
	'Update',
);

	$this->menu=array(
	array('label'=>'List HdCompras','url'=>array('index')),
	array('label'=>'Create HdCompras','url'=>array('create')),
	array('label'=>'View HdCompras','url'=>array('view','id'=>$model->ID_COMPRA)),
	array('label'=>'Manage HdCompras','url'=>array('admin')),
	);
	?>

	<h1>Update HdCompras <?php echo $model->ID_COMPRA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>