<?php

namespace app\modules\v1\controllers;

use modules\v1\models\PriceForm;
use modules\v1\services\PriceService;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Request;

class PriceController extends Controller
{
    private PriceService $service;

    public function __construct($id, $module, $config, PriceService $service)
    {
        $this->service = $service;

        parent::__construct($id, $module, $config);
    }

    public function actionGet(Request $request)
    {
        $form = PriceForm::fromAssoc($request->post());
        $res = $this->service->getPrice($form);

        return Json::encode($res);
    }
}