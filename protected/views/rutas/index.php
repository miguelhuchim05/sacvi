<?php
$this->breadcrumbs=array(
	'Rutases',
);

$this->menu=array(
array('label'=>'Crear ruta','url'=>array('create')),
array('label'=>'Administrar rutas','url'=>array('admin')),
);
?>

<h3 class="page-header">Rutas</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
