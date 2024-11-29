<?php

namespace app\modules\v1\controllers;

use yii\web\Controller;
use yii\web\Request;

class LocationController extends Controller
{
    public function actionGet(Request $request)
    {
        return $this->reqDispatch($request);
    }

    private function reqDispatch(Request $request)
    {
        if($request->post('search'))
        {
            return $this->search($request->post('search'));
        }

        return $this->getDefault();
    }

    private function search(string $input): array
    {

    }

    private function getDefault(): array
    {}
}