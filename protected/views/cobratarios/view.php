<?php
$this->breadcrumbs=array(
	'Cobratarioses'=>array('index'),
	$model->ID_COBRATARIO,
);

$this->menu=array(
array('label'=>'List Cobratarios','url'=>array('index')),
array('label'=>'Create Cobratarios','url'=>array('create')),
array('label'=>'Update Cobratarios','url'=>array('update','id'=>$model->ID_COBRATARIO)),
array('label'=>'Delete Cobratarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_COBRATARIO),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cobratarios','url'=>array('admin')),
);
?>

<h1>View Cobratarios #<?php echo $model->ID_COBRATARIO; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_COBRATARIO',
		'NOMBRE',
		'DIRECCION',
		'TELEFONO',
		'CELULAR',
		'FECHA_INGRESO',
		'SUELDO',
),
)); ?>
