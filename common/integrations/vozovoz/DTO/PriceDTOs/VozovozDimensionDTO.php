<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozDimensionDTO extends DataTransferObject
{
    public float $volume;
    public float $weight;
    public int $quantity = 1;
}