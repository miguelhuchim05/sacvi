<?php 
$this->breadcrumbs=array(
	'Articuloses',
);

$this->menu=array(
array('label'=>'Crear articulo','url'=>array('create')),
array('label'=>'Administrar articulos','url'=>array('admin')),
);
?>

<h3 class="page-header">Articulos</h3>
<div align="left"> <!--pager-->
	<?php 
	$this->widget('ext.PageSize.EPageSize', array(
	'listViewId' => 'articulos-list',
	'beforeLabel' => 'Seleccionar cantidad: ',
    'pageSize' => Yii::app()->request->getParam('pageSize',null),
    'defaultPageSize' =>  10 ,
    'pageSizeOptions'=> array(5=>5, 10=>10, 20=>20, 30=>30, 40=>40, 50=>50, 75=>75, 100=>100),
    ));

    $dataProvider = $model->search();
    $pageSize = Yii::app()->user->getState('pageSize',10);
    $dataProvider->getPagination()->setPageSize($pageSize);
    ?>
</div>

<?php $this->widget('booster.widgets.TbListView',array(
'id' => 'articulos-list',
'itemsCssClass' => 'list-group',
'summaryText' => 'Mostrar {start}-{end} de {count} resultados',
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
