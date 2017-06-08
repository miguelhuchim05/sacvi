<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->ID_CLIENTE,
);

$this->menu=array(
array('label'=>'List Clientes','url'=>array('index')),
array('label'=>'Create Clientes','url'=>array('create')),
array('label'=>'Update Clientes','url'=>array('update','id'=>$model->ID_CLIENTE)),
array('label'=>'Delete Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CLIENTE),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Clientes','url'=>array('admin')),
);
?>

<h1>View Clientes #<?php echo $model->ID_CLIENTE; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_CLIENTE',
		'ID_BARRIO',
		'ID_LOCALIDAD',
		'NOMBRE',
		'DIRECCION',
		'SALDO',
		'EFECTIVIDAD',
),
)); ?>
