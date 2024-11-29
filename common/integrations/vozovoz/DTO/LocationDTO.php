<?php

namespace common\integrations\vozovoz\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;
use common\models\Location;

class LocationDTO extends DataTransferObject
{
    public string $object = 'location';
    public string $action = 'get';
    public ?LocationParamsDTO $params = null;
}