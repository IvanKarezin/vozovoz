<?php

namespace common\integrations\vozovoz\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class VozovozDTO extends DataTransferObject
{
    public string $object = 'price';
    public string $action = 'get';
}