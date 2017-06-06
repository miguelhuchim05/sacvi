<?php
$this->breadcrumbs=array(
	'Localidades',
);

$this->menu=array(
array('label'=>'Create Localidades','url'=>array('create')),
array('label'=>'Manage Localidades','url'=>array('admin')),
);
?>

<h1>Localidades</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
