<?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
array('label'=>'Crear proveedor','url'=>array('create')),
array('label'=>'Administrar proveedores','url'=>array('admin')),
);
?>

<h3 class="page-header">Proveedores</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
