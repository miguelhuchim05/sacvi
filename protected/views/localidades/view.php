<?php
$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->ID_LOCALIDAD,
);

$this->menu=array(
array('label'=>'List Localidades','url'=>array('index')),
array('label'=>'Create Localidades','url'=>array('create')),
array('label'=>'Update Localidades','url'=>array('update','id'=>$model->ID_LOCALIDAD)),
array('label'=>'Delete Localidades','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LOCALIDAD),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Localidades','url'=>array('admin')),
);
?>

<h1>View Localidades #<?php echo $model->ID_LOCALIDAD; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_LOCALIDAD',
		'NOMBRE',
),
)); ?>
