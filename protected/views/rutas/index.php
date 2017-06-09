<?php
$this->breadcrumbs=array(
	'Rutases',
);

$this->menu=array(
array('label'=>'Create Rutas','url'=>array('create')),
array('label'=>'Manage Rutas','url'=>array('admin')),
);
?>

<h1>Rutases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
