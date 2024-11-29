<?php

namespace common\integrations\vozovoz\DTO\PriceDTOs;

enum PointEnum: string
{
    case Terminal = 'terminal';
    case Address = 'address';
    case Yandex = 'pup';
}
