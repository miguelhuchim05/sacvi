<?php
$this->menu=array(
array('label'=>'Administrar proveedores','url'=>array('admin')),
);
?>
<h3 class="page-header">Reportes</h3>
<?php
$this->widget(
    'booster.widgets.TbButton',
    array(
    	'buttonType' => 'link',
    	'url' => array('reports','gen' => 'all'),
        'label' => 'Generar',
        'context' => 'primary',
        'htmlOptions' => array(
        	'target' => '_blank',
        	),
    )
);
?>