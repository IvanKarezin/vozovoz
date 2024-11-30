<?php

return [
    'id' => 'v1',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'class' => \yii\rest\UrlRule::class,
                'only' => ['POST']
            ],
        ],
        'request' => [
            'class' => \yii\web\Request::class,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'log' => [
            'class' => \yii\log\Logger::class,
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'controllerMap' => [
        'location' => [
            'class' => \app\modules\v1\controllers\LocationController::class,
            'enableCsrfValidation' => false,
        ],
        'price' => [
            'class' => \app\modules\v1\controllers\PriceController::class,
            'enableCsrfValidation' => false,
        ]
    ],
    'params' => [

    ]
];