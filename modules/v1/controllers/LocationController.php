<?php

namespace app\modules\v1\controllers;

use common\models\providers\LocationDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Request;

class LocationController extends Controller
{
    public function actionGet(Request $request)
    {
        $provider = new LocationDataProvider($request->post());

        return Json::encode($provider->getModels());
    }
}