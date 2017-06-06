<?php
/* @var $this BarriosController */

$this->breadcrumbs=array(
	'Barrios',
);
$this->menu=array(
array('label'=>'Manage Localidades','url'=>Yii::app()->request->urlReferrer),
);
?>

<h1>Localidades</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
