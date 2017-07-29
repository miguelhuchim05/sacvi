<?php
$this->menu=array(
array('label'=>'Administrar clientes','url'=>array('admin')),
);
?>
<h3 class="page-header">Reportes</h3>
<?php echo $this->renderPartial('_reporte', array('model' => $model)); ?>