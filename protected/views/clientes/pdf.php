<!DOCTYPE html>
<html>
<head>
	<!-- <title></title> -->
	<style type="text/css">
		body {
		  position: relative;
		  width: 21cm;  
		  height: 29.7cm; 
		  margin: 0 auto; 
		  color: #001028;
		  background: #FFFFFF; 
		  font-family: Arial, sans-serif; 
		  font-size: 12px; 
		  font-family: Arial;
		}
		.logo {
			float: left;
			width: 72px;
			height: 54px;
			opacity: 0.7;			
		}
		.main{
			margin-top: 20px;
		}
		.main table {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-bottom: 20px;
		}
		
		.main table tr:nth-child(2n-1) td {
		  background: #F5F5F5;
		}
		
		.main table th,
		.main table td {
		  text-align: center;
		}
		
		.main table th {
		  padding: 5px 20px;
		  color: #5D6975;
		  border-bottom: 1px solid #C1CED9;
		  white-space: nowrap;        
		  font-weight: normal;
		}
		.main table td {
		  padding: 5px;
		  text-align: center;
		}
		#project {
		  float: left;
		}
		#project span {		  
		  color: #5D6975;
		  text-align: right;
		  width: 52px;
		  margin-right: 10px;
		  display: inline-block;
		  font-size: 1em;
		}
	</style>
</head>
<body>
<?php
$items = array(
	//array('name'=>'iDBARRIO.iDLOCALIDAD.NOMBRE', 'header'=>'Localidad'),
	array('name'=>'NOMBRE', 'header'=>'Nombre de cliente'),
	array('name'=>'iDBARRIO.NOMBRE', 'header'=>'Barrio'),
	'DIRECCION',
	//'FECHA_CREACION',        
	array('name'=>'SALDO', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->SALDO, "MXN")'),
	'EFECTIVIDAD',
	);
?>
<div id="project">
  <div><span>Localidad</span> <?php echo $model->getData()[0]->iDBARRIO->iDLOCALIDAD->NOMBRE; ?></div>
  <?php if ($on):
  unset($items[1]);
  ?>
  	<div><span>Barrio</span> <?php echo $model->getData()[0]->iDBARRIO->NOMBRE;?></div>
  <?php endif ?>
</div>
<div class="row main">
<?php $this->widget('booster.widgets.TbGridView',array( 
'dataProvider'=>$model,
'template' => '{items}',
'columns'=>$items, 
)); ?>
</div>
</body>
</html>