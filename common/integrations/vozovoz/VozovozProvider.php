<?php

namespace common\integrations\vozovoz;

use common\integrations\vozovoz\DTO\LocationDTO;
use common\integrations\vozovoz\DTO\LocationResultDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\PriceDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\PriceResult\PriceResultDTO;

class VozovozProvider
{
    private VozovozDriver $driver;

    public function __construct()
    {
        $this->driver = new VozovozDriver();
    }

    public function searchLocations(?LocationDTO $location = null): array
    {
        $response = $this->driver->request($location ?? new LocationDTO());
        $res = [];

        foreach ($response->data['response']['data'] as $location) {
            $res[] = new LocationResultDTO($location);
        }

        return $res;
    }

    public function getLocation(LocationDTO $location): ?LocationResultDTO
    {
        $response = $this->driver->request($location)->data;

        if(!(sizeof($response['response']['data']) > 1))
        {
            return new LocationResultDTO($response['response']['data'][0]);
        }

        return null;
    }

    public function getPrice(PriceDTO $dto): PriceResultDTO
    {
        $response = $this->driver->request($dto)->data;

        return new PriceResultDTO($response['response']);
    }
}