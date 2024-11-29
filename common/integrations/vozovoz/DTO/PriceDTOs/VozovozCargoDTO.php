<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozCargoDTO extends DataTransferObject
{
    public VozovozDimensionDTO $dimension;
}