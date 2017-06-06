<?php
$this->menu=array(
array('label'=>'Manage Barrios','url'=>Yii::app()->request->urlReferrer),
);
?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>