<?php

namespace app\modules\v1\controllers;

use yii\helpers\Json;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return  Json::encode(['ok' => 'true']);
    }
}
