<?php
$this->breadcrumbs=array(
	'Dt Comprases'=>array('index'),
	$model->ID_DTCOMPRAS,
);

$this->menu=array(
array('label'=>'List DtCompras','url'=>array('index')),
array('label'=>'Create DtCompras','url'=>array('create')),
array('label'=>'Update DtCompras','url'=>array('update','id'=>$model->ID_DTCOMPRAS)),
array('label'=>'Delete DtCompras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_DTCOMPRAS),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage DtCompras','url'=>array('admin')),
);
?>

<h1>View DtCompras #<?php echo $model->ID_DTCOMPRAS; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_DTCOMPRAS',
		'ID_COMPRA',
		'ID_ARTICULO',
		'CANTIDAD',
		'PR_COSTO',
		'IMPORTE',
),
)); ?>
