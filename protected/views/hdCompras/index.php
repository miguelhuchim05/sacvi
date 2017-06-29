<?php
$this->breadcrumbs=array(
	'Hd Comprases',
);

$this->menu=array(
array('label'=>'Create HdCompras','url'=>array('create')),
array('label'=>'Manage HdCompras','url'=>array('admin')),
);
?>

<h1>Hd Comprases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
