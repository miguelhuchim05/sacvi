<?php
$this->menu=array(
array('label'=>'Administrar barrios','url'=>Yii::app()->request->urlReferrer),
);
?>
<h3 class="page-header">Actualizar barrio #<?php echo $model->ID_BARRIO; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>