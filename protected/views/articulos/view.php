<?php
$this->breadcrumbs=array(
	'Articuloses'=>array('index'),
	$model->ID_ARTICULO,
);

$this->menu=array(
array('label'=>'Listar articulos','url'=>array('index')),
array('label'=>'Crear articulo','url'=>array('create')),
array('label'=>'Actualizar articulo','url'=>array('update','id'=>$model->ID_ARTICULO)),
array('label'=>'Eliminar Articulo actual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ARTICULO),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar articulos','url'=>array('admin')),
);
?>

<h3 class="page-header">Ver articulo #<?php echo $model->ID_ARTICULO; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_ARTICULO',
		'DESCRIPCION',
		'MODELO',
		'MARCA',
		'COLOR',
		'PR_COSTO',
		'PORCENT_UTILIDAD',
		'PR_VENTA',
),
)); ?>
