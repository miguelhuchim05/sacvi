<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-tittle">Iniciar sesión</div>
			</div>
			<div style="padding-top:30px;" class="panel-body">
				<?php echo $content?>
			</div>
		</div>
	</div>
</div>
</body>
</html>