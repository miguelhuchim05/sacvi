<?php
$this->menu=array(
array('label'=>'Administrar Localidades','url'=>array('localidades/admin')),
);
?>
<h3 class="page-header">Agregar barrio a <?php echo $localidad->NOMBRE;?></h3>
<?php echo $this->renderPartial('_form', array(
'model'=>$model,
'localidad' => $localidad,
)); ?>