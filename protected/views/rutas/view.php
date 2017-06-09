<?php
$this->breadcrumbs=array(
	'Rutases'=>array('index'),
	$model->ID_RUTA,
);

$this->menu=array(
array('label'=>'List Rutas','url'=>array('index')),
array('label'=>'Create Rutas','url'=>array('create')),
array('label'=>'Update Rutas','url'=>array('update','id'=>$model->ID_RUTA)),
array('label'=>'Delete Rutas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_RUTA),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Rutas','url'=>array('admin')),
);
?>

<h1>View Rutas #<?php echo $model->ID_RUTA; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_RUTA',
		'NOMBRE',		
		array(
			'label'=>'Cobratario',
			'name'=>'iDCOBRATARIO.NOMBRE',
			),
),
)); ?>
