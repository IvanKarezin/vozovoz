<?php

namespace modules\v1\models;

use yii\base\Model;
use yii\db\Exception;

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

        if($from->validate() && $to->validate() && $price->validate())
        {
            return $price;
        }

        throw new Exception(self::getErrorsToString($from, $to, $price));
    }

    private static function getErrorsToString(PointForm $from, PointForm $to, PriceForm $price): string
    {
        $fromErrors = implode(',', $from->errors);
        $toErrors = implode(' ', $to->errors);
        $priceErrors = implode(' ', $price->errors);

        return $fromErrors . ' ' . $toErrors . ' ' . $priceErrors;
    }
}