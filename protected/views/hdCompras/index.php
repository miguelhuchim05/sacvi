<?php
$this->breadcrumbs=array(
	'Hd Comprases',
);

$this->menu=array(
array('label'=>'Crear compra','url'=>array('create')),
array('label'=>'Administrar compras','url'=>array('admin')),
);
?>

<h3 class="page-header">Compras a proveedores</h3>
<div align="left"> <!--pager-->
	<?php 
	$this->widget('ext.PageSize.EPageSize', array(
	'listViewId' => 'hd-compras-list',
	'beforeLabel' => 'Seleccionar cantidad: ',
    'pageSize' => Yii::app()->request->getParam('pageSize',null),
    'defaultPageSize' =>  10 ,
    'pageSizeOptions'=> array(5=>5, 10=>10, 20=>20, 30=>30, 40=>40, 50=>50, 75=>75, 100=>100),
    ));

    $dataProvider = $model;
    $pageSize = Yii::app()->user->getState('pageSize',10);
    $dataProvider->getPagination()->setPageSize($pageSize);
    ?>
</div>
<?php $this->widget('booster.widgets.TbListView',array(
'id' => 'hd-compras-list',
'itemsCssClass' => 'list-group',
'summaryText' => 'Mostrar {start}-{end} de {count} resultados',
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
