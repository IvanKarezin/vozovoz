<?php

namespace common\integrations\vozovoz\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;
use common\models\Location;

class LocationDTO extends VozovozDTO
{
    public string $object = 'location';
    public ?LocationParamsDTO $params = null;
}