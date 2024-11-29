<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozGatewayDTO extends DataTransferObject
{
    public VozovozDispatchDTO $dispatch;
    public VozovozDestinationDTO $destination;
}