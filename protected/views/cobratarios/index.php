<?php
$this->breadcrumbs=array(
	'Cobratarioses',
);

$this->menu=array(
array('label'=>'Crear cobratarios','url'=>array('create')),
array('label'=>'Administrar cobratarios','url'=>array('admin')),
);
?>

<h3 class="page-header">Cobratarios</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
