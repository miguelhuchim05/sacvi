<?php
$this->menu=array(
array('label'=>'Manage Localidades','url'=>array('localidades/admin')),
);
?>
<h1>Agregar barrio a <?php echo $localidad->NOMBRE;?></h1>

<?php echo $this->renderPartial('_form', array(
'model'=>$model,
'localidad' => $localidad,
)); ?>