<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
array('label'=>'Crear cliente','url'=>array('create')),
array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>

<h3 class="page-header">Clientes</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
