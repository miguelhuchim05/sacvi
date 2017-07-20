<?php
$this->breadcrumbs=array(
	'Hd Comprases',
);

$this->menu=array(
array('label'=>'Crear compra','url'=>array('create')),
array('label'=>'Administrar compras','url'=>array('admin')),
);
?>

<h3 class="page-header">Compras a proveedores</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
