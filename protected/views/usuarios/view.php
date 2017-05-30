<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->ID_USUARIO,
);

$this->menu=array(
array('label'=>'List Usuarios','url'=>array('index')),
array('label'=>'Create Usuarios','url'=>array('create')),
array('label'=>'Update Usuarios','url'=>array('update','id'=>$model->ID_USUARIO)),
array('label'=>'Delete Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_USUARIO),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h1>View Usuarios #<?php echo $model->ID_USUARIO; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ID_USUARIO',
		'FULL_NAME',
		'USER_NAME',
		'PASSWORD_',
		'DIRECCION',
		'CELULAR',
),
)); ?>
