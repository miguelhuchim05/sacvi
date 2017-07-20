<?php
$this->breadcrumbs=array(
	'Abonos Comprases'=>array('index'),
	$model->ID_ABONO=>array('view','id'=>$model->ID_ABONO),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AbonosCompras','url'=>array('index')),
	array('label'=>'Create AbonosCompras','url'=>array('create')),
	array('label'=>'View AbonosCompras','url'=>array('view','id'=>$model->ID_ABONO)),
	array('label'=>'Manage AbonosCompras','url'=>array('admin')),
	);
	?>

	<h1>Update AbonosCompras <?php echo $model->ID_ABONO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>