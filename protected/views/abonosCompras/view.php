<?php
$this->menu=array(
array('label'=>'List AbonosCompras','url'=>array('index')),
array('label'=>'Create AbonosCompras','url'=>array('create')),
array('label'=>'Update AbonosCompras','url'=>array('update','id'=>$model->ID_ABONO)),
array('label'=>'Delete AbonosCompras','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ABONO),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage AbonosCompras','url'=>array('admin')),
);
?>

<h1>View AbonosCompras #<?php echo $model->ID_ABONO; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_ABONO',
		'ID_COMPRA',
		'NO_ABONO',
		'FECHA',
		'IMPORTE',
		'STATUS',
),
)); ?>
