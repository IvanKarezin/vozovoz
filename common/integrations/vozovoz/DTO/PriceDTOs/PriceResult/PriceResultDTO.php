<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs\PriceResult;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class PriceResultDTO extends DataTransferObject
{
    public float $basePrice;
    public float $price;

    #[CastWith(DeliveryTimeCaster::class)]
    public string $deliveryTime;
}