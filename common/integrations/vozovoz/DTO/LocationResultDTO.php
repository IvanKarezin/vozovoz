<?php

namespace common\integrations\vozovoz\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class LocationResultDTO extends DataTransferObject
{
    public string $guid;
    public string $name;
    public string $country;
}