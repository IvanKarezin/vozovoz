<?php

namespace common\integrations\vozovoz\DTO;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class LocationParamsDTO extends DataTransferObject
{
    #[MapFrom('guid')]
    public ?string $id;
    public ?string $search;
}