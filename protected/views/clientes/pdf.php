<!DOCTYPE html>
<html>
<head>
	<!-- <title></title> -->
	<style type="text/css">
		.logo {
			float: left;
			width: 72px;
			height: 54px;
			opacity: 0.7;			
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
	</style>
</head>
<body>
<div class="main">
<?php $this->widget('booster.widgets.TbGridView',array( 
'dataProvider'=>$model,
'template' => '{items}',
'columns'=>array(
        array('name'=>'iDBARRIO.iDLOCALIDAD.NOMBRE', 'header'=>'Localidad'),
        array('name'=>'iDBARRIO.NOMBRE', 'header'=>'Barrio'),
        array('name'=>'NOMBRE', 'header'=>'Cliente'),
        'DIRECCION',
        //'FECHA_CREACION',        
        array('name'=>'SALDO', 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->SALDO, "MXN")'),
        'EFECTIVIDAD',
), 
)); ?> 

<table>
<?php
/*foreach ($model->getData() as $record) {
	echo "<tr>";
	echo "<td>".$record->NOMBRE."</td>";
	echo "<td>".$record->iDBARRIO->iDLOCALIDAD->NOMBRE."</td>";	
	echo "</tr>";
}*/
?>
</table>
</div>
</body>
</html>