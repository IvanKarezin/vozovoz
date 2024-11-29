<?php

namespace modules\v1\models;

use yii\base\Model;

class PointForm extends Model
{
    public string $guid;
    public string $country;
    public string $type;

    public function rules()
    {
        return [
            [['guid', 'country', 'type'], 'required'],
            [['guid', 'country', 'type'], 'string'],
        ];
    }
}