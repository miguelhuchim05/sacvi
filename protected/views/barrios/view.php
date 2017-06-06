<?php
$this->menu=array(
array('label'=>'Manage Barrios','url'=>array('admin','id'=>$model->ID_LOCALIDAD)),
);
?>
<h1>Ver Barrio #<?php echo $model->ID_LOCALIDAD; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(		
		array(
			'label'=>'Localidad',
			'name'=>'iDLOCALIDAD.NOMBRE',
			),
		array(
			'label'=>'Barrio',
			'name'=>'NOMBRE',
			),
),
)); ?>