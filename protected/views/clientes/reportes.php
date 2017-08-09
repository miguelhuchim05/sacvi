<?php
$this->menu=array(
array('label'=>'Administrar clientes','url'=>array('admin')),
);
?>
<h3 class="page-header">Reportes</h3>
<p>
	Opcionalmente puede introducir un operador de comparación en el campo saldo (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	o <b>=</b>) al principio de cada uno de los valores.
</p>
<p>Por ejemplo para mostrar saldos mayores a 100 ingresar: <b>>100</b></p>
<p>Por ejemplo para mostrar saldos igual a 0 ingresar: <b>0</b> o <b>=0</b></p>
<?php echo $this->renderPartial('_reporte', array('model' => $model)); ?>