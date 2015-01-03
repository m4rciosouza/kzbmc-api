<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	'language' => 'pt-BR',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'kazale.com',
        	'parsers' => [
        			'application/json' => 'yii\web\JsonParser',
        	]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    	'i18n' => [
    				'translations' => [
    					'*' => [
    							'class' => 'yii\i18n\PhpMessageSource',
    							'fileMap' => [
    									'app' => 'app.php',
    									'projeto_canvas' => 'projeto_canvas.php',
    									'usuario' => 'usuario.php',
    									'item_canvas' => 'item_canvas.php'
    							],
    					],
    			],
    	],
    	'urlManager' => [
    			'enablePrettyUrl' => true,
    			'enableStrictParsing' => true,
    			'showScriptName' => true,
    			'rules' => [
    					// RestFul routes
    					['class' => 'yii\rest\UrlRule',
    						'controller' => 'v1/compartilhado',
    					],
    					['class' => 'yii\rest\UrlRule', 
    					 	'controller' => 'v1/projeto-canvas', 
    					 	'extraPatterns' => ['GET,OPTIONS usuario/{id}' => 'buscar-por-id-usuario']
    					],
    					['class' => 'yii\rest\UrlRule', 
    					 	'controller' => 'v1/item-canvas',
    					 	'extraPatterns' => ['GET,OPTIONS projeto-canvas/{id}' => 'buscar-por-id-projeto-canvas']
    					],
    					['class' => 'yii\rest\UrlRule',
    						'controller' => 'v1/usuario',
    						'extraPatterns' => [
    								'POST,OPTIONS auth' => 'autenticar', 
    								'POST,OPTIONS esqueci-senha' => 'esqueci-senha'
    							]
    					],
    					// backend routes
    					['class' => 'yii\web\UrlRule', 'pattern' => '<controller:\w+>', 'route' => '<controller>/index'],
    					['class' => 'yii\web\UrlRule', 'pattern' => '<controller:\w+>/<id:\d+>', 'route' => '<controller>/view'],
    					['class' => 'yii\web\UrlRule', 'pattern' => '<controller:\w+>/<action:\w+>/<id:\d+>', 'route' => '<controller>/<action>'],
    					['class' => 'yii\web\UrlRule', 'pattern' => '<controller:\w+>/<action:\w+>', 'route' => '<controller>/<action>'],
    			],
    	]
    ],
   	'modules' => [
   			'v1' => [
   					'class' => 'app\modules\v1\ProjetoCanvas',
   			],
   	],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
