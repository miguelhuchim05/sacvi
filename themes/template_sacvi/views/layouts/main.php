<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/custom.css" rel="stylesheet">
</head>
<body>
<?php
$dinamycitem=array();
if(!Yii::app()->user->isGuest){    
$auth=Yii::app()->authManager;
$roles = $auth->getRoles(Yii::app()->user->id);
foreach ($roles as $data) {    
    $modulos = $auth->getItemChildren($data->name);
    foreach ($modulos as $modulo) {    
        $dinamycitem [] = array('label'=>$modulo->name, 'url'=>array('/'.$modulo->name.'/admin'));
    }
}
}
?>
<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => 'inverse', // null or 'inverse'
        'brand' => 'SACVI',
        'brandUrl' => array('/site/index'),
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
            	'type' => 'navbar',
                'items' => $dinamycitem,
            ),            
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                	array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label' => 'Logout ('.Yii::app()->user->name.')', 'url' => array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                ),
            ),
        ),
    )
);
?>
<div class="container-fluid">
	<?php echo $content;?>
</div>
</body>
</html>