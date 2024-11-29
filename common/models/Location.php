<?php

namespace common\models;

use yii\base\Model;

class Location extends Model
{
    public ?string $guid;
    public ?string $name;
    public ?string $country;
    public ?string $search = null;

    public function rules()
    {
        return [
            [['guid'], 'required', 'when' => function ($model)  {
                return empty($model->search);
            }],
            ['search', 'required', 'when' => function ($model) {
                return empty($model->guid);
            }],
            [['guid', 'name', 'country', 'search'], 'string'],
            ['search', 'safe'],
            ['country', 'string', 'length' => [2, 3]],
        ];
    }
}