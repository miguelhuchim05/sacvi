<?php
$this->breadcrumbs=array(
	'Cobratarioses',
);

$this->menu=array(
array('label'=>'Create Cobratarios','url'=>array('create')),
array('label'=>'Manage Cobratarios','url'=>array('admin')),
);
?>

<h1>Cobratarioses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
