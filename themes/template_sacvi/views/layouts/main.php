<!DOCTYPE html>
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/custom.css" rel="stylesheet">
</head>
<body>
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
                'items' => array(
                    array('label' => 'Home', 'url' => array('/site/index'), 'active' => true),
                    array('label' => 'About', 'url' => array('/site/page', 'view'=>'about')),
                    array('label'=>'Contact', 'url'=>array('/site/contact')),
                ),
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
<div class="container">
	<?php echo $content;?>
</div>
</body>
</html>