<?php

namespace common\models;

use yii\base\Model;

class Location extends Model
{
    public ?string $guid;
    public ?string $name;
    public ?string $country;

    public function rules()
    {
        return [
            [['guid'], 'required'],
            [['guid', 'name', 'country'], 'string'],
            ['country', 'string', 'length' => [2, 3]],
        ];
    }
}