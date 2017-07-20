<?php
$this->breadcrumbs=array(
	'Usuarioses',
);

$this->menu=array(
array('label'=>'Crear usuario','url'=>array('create')),
array('label'=>'Administrar usuarios','url'=>array('admin')),
);
?>

<h3 class="page-header">Usuarios</h3>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
