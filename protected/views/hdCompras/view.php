<?php
$this->breadcrumbs=array(
	'Hd Comprases'=>array('index'),
	$model->ID_COMPRA,
);

$this->menu=array(
array('label'=>'List HdCompras','url'=>array('index')),
array('label'=>'Create HdCompras','url'=>array('create')),
array('label'=>'Update HdCompras','url'=>array('update','id'=>$model->ID_COMPRA)),
array('label'=>'Delete HdCompras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_COMPRA),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage HdCompras','url'=>array('admin')),
);
?>

<h1>View HdCompras #<?php echo $model->ID_COMPRA; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_COMPRA',
		'ID_PROVEEDOR',
		'NO_FACTURA',
		'PLAZO_LIQUIDACION',
		'FECHA',
		'IMPORTE',
		'SALDO',
		'ESTATUS_PAGO',
		'APLICADA',
),
)); ?>
