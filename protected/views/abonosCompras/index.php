<?php
$this->breadcrumbs=array(
	'Abonos Comprases',
);

$this->menu=array(
array('label'=>'Create AbonosCompras','url'=>array('create')),
array('label'=>'Manage AbonosCompras','url'=>array('admin')),
);
?>

<h1>Abonos Comprases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
