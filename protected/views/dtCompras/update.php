<?php
$this->breadcrumbs=array(
	'Dt Comprases'=>array('index'),
	$model->ID_DTCOMPRAS=>array('view','id'=>$model->ID_DTCOMPRAS),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DtCompras','url'=>array('index')),
	array('label'=>'Create DtCompras','url'=>array('create')),
	array('label'=>'View DtCompras','url'=>array('view','id'=>$model->ID_DTCOMPRAS)),
	array('label'=>'Manage DtCompras','url'=>array('admin')),
	);
	?>

	<h1>Update DtCompras <?php echo $model->ID_DTCOMPRAS; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>