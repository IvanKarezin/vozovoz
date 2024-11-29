<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\DefaultCast;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Casters\EnumCaster;
use Spatie\DataTransferObject\DataTransferObject;

class VozovozPointDTO extends DataTransferObject
{
    #[MapFrom('guid')]
    public string $location;

    #[MapFrom('type')]
    #[CastWith(EnumCaster::class, PointEnum::class)]
    public PointEnum $terminal;
}