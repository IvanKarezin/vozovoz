<?php

namespace modules\v1\models;

use yii\base\Model;

class PriceForm extends Model
{
    public PointForm $from;
    public PointForm $to;
    public float $volume;
    public float $weight;

    public function rules()
    {
        return [
            [['volume', 'weight'], 'required'],
            [['volume', 'weight'], 'double']
        ];
    }

    public static function fromAssoc(array $data): self
    {
        $from = new PointForm();
        $to = new PointForm();
        $price = new self();

        $from->load($data['from'], '');
        $to->load($data['to'], '');
        $price->load($data, '');
        $price->from = $from;
        $price->to = $to;

        return $price;
    }
}