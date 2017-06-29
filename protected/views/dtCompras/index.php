<?php
$this->breadcrumbs=array(
	'Dt Comprases',
);

$this->menu=array(
array('label'=>'Create DtCompras','url'=>array('create')),
array('label'=>'Manage DtCompras','url'=>array('admin')),
);
?>

<h1>Dt Comprases</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
