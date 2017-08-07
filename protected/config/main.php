<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SACVI',
	'theme' => 'template_sacvi',
	'timeZone' => 'America/Mexico_City',
	// preloading 'log' component
	'preload'=>array('log', 'booster'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.cruge.components.*',
		'application.modules.cruge.extensions.crugemailer.*',
	),

	'modules'=>array(
		'cruge' => array(
			'tableprefix'=>'cruge_',
			'availableAuthMethods'=>array('default'),
			'availableAuthModes'=>array('username','email'),
			//aseUrl'=>'http://coco.com/',
 			'debug'=> false,
 			'rbacSetupEnabled'=>true,
 			'allowUserAlways'=>false,
			'useEncryptedPassword' => false,
			'hash' => 'md5',
			//'afterLoginUrl'=>'index.php',
			'afterLogoutUrl'=>null,
			'afterSessionExpiredUrl'=>null,
			
			'loginLayout'=>'//layouts/layerlogin',//listo
			'registrationLayout'=>'//layouts/login',
			'activateAccountLayout'=>'//layouts/column2',
			'editProfileLayout'=>'//layouts/column2',
			'useCGridViewClass'=>'booster.widgets.TbExtendedGridView',
			'generalUserManagementLayout'=>'//layouts/column2',
			),
		// uncomment the following to enable the Gii tool		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'dev',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				'booster.gii'),
		),		
	),

	// application components
	'components'=>array(
		'booster' => array(
			'class' => 'ext.booster.components.Booster'),
		'ePdf' => array(
			'class' => 'ext.yii-pdf.EYiiPdf',
			'params' => array(
				'mpdf' => array(
					'librarySourcePath' => 'application.vendors.mpdf.*',
					'constants' => array(
						'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
						),
					),
				'class' => 'mpdf',
				),
		),//fin ePedf
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'application.modules.cruge.components.CrugeWebUser',
			'loginUrl' => array('/cruge/ui/login'),
		),

		// uncomment the following to enable URLs in path-format		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),
		'authManager'=>array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'crugemailer' => array(
        	'class' => 'application.modules.cruge.components.CrugeMailer',
        	'mailfrom' => 'migueltmpr20@gmail.com',
        	'subjectprefix' => 'Recuperción de contraseña SACVI',
        	'debug' => true,
        	),
        'format' => array(
        	'datetimeFormat'=>"d M, Y h:m:s a",
        	),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
