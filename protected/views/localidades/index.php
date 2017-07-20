<?php
$this->breadcrumbs=array(
	'Localidades',
);

$this->menu=array(
array('label'=>'Crear Localidad','url'=>array('create')),
array('label'=>'Administrar Localidades','url'=>array('admin')),
);
?>

<h3 class="page-header">Localidades</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
