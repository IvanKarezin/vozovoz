<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozPriceParamsDTO extends DataTransferObject
{
    public VozovozCargoDTO $cargo;
    public VozovozGatewayDTO $gateway;
}