<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs\PriceResult;

use Spatie\DataTransferObject\Caster;

class DeliveryTimeCaster implements Caster
{
    public function cast(mixed $value): string
    {
        if(is_array($value))
        {
            return 'От ' . $value['from'] . ' до ' . $value['to'] . ' дней.';
        }
    }
}