<?php
$this->menu=array(
array('label'=>'Administrar barrios','url'=>array('admin','id'=>$model->ID_LOCALIDAD)),
);
?>
<h3 class="page-header">Ver Barrio #<?php echo $model->ID_LOCALIDAD; ?></h3>

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