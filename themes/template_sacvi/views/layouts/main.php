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
                    array(
                        'label' => 'Catalogos',
                        'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('Catalogos'),
                        'items' => array(
                            //array('label' => 'Datos generales','url' => '#',),                            
                            array('label' => 'Localidades','url' => Yii::app()->createUrl("localidades/admin"),),
                            //array('label' => 'Barrios','url' => array('Barrios/admin'),),
                            array('label' => 'Clientes','url' => Yii::app()->createUrl("clientes/admin"),),
                            array('label' => 'Rutas','url' => Yii::app()->createUrl("rutas/admin"),),
                            array('label' => 'Proveedores','url' => Yii::app()->createUrl("proveedores/admin"),),
                            //array('label' => 'Articulos','url' => '#',),
                            //array('label' => 'Cuentas bancarias','url' => '#',),
                            array('label' => 'Cobratarios','url' => Yii::app()->createUrl("cobratarios/admin"),),
                            )
                        ),//fin catalogos
                    array(
                        'label' => 'Movimientos',
                        'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('Movimientos'),
                        'items' => array(
                            array('label' => 'Compras','url' => Yii::app()->createUrl("hdCompras/admin"),),
                            //array('label' => 'Ventas','url' => '#',),
                            //array('label' => 'Abonos','url' => '#',),
                            //array('label' => 'Bancarios','url' => '#',),
                            //array('label' => 'Devoluciones','url' => '#',),                            
                            )
                        ),//fin Movimientos
                    array(
                        'label' => 'Control de acceso',
                        'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('Control_de_acceso'),
                        'items' => array(
                            array('label' => 'Listado de usuarios','url' => Yii::app()->user->ui->usermanagementadminUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_usermanagementadmin'),),
                            array('label' => 'Crear usuarios','url' => Yii::app()->user->ui->usermanagementcreateUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_usermanagementcreate'),),
                            array('label' => 'Crear roles','url' => Yii::app()->user->ui->rbaclistrolesUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_rbaclistroles'),),
                            array('label' => 'Crear Tareas','url' => Yii::app()->user->ui->rbaclisttasksUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_rbaclisttasks'),),
                            array('label' => 'Asignacion de roles a usuarios','url' => Yii::app()->user->ui->rbacusersassignmentsUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_rbacusersassignments'),),
                            '---',
                            array('label' => 'Sesiones','url' => Yii::app()->user->ui->sessionadminUrl,
                                'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('action_ui_rbacusersassignments'),),
                            )
                        ),//fin administrar usuarios
                    ),
            ),            
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                	array('label'=>'Login'
                    , 'url'=>Yii::app()->user->ui->loginUrl
                    , 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Logout ('.Yii::app()->user->name.')'
                    , 'url'=>Yii::app()->user->ui->logoutUrl
                    , 'visible'=>!Yii::app()->user->isGuest),
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