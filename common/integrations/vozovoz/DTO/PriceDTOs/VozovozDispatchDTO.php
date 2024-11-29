<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozDispatchDTO extends DataTransferObject
{
    public VozovozPointDTO $point;
}