<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozDestinationDTO extends DataTransferObject
{
    public VozovozPointDTO $point;
}