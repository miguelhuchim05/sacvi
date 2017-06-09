<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	$model->ID_COBRATARIO=>array('view','id'=>$model->ID_COBRATARIO),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cobratarios','url'=>array('index')),
	array('label'=>'Create Cobratarios','url'=>array('create')),
	array('label'=>'View Cobratarios','url'=>array('view','id'=>$model->ID_COBRATARIO)),
	array('label'=>'Manage Cobratarios','url'=>array('admin')),
	);
	?>

	<h1>Update Cobratarios <?php echo $model->ID_COBRATARIO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>