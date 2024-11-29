<?php

namespace modules\v1\services;

use common\integrations\vozovoz\DTO\PriceDTOs\PriceDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\PriceResult\PriceResultDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\VozovozCargoDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\VozovozDestinationDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\VozovozDispatchDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\VozovozGatewayDTO;
use common\integrations\vozovoz\DTO\PriceDTOs\VozovozPriceParamsDTO;
use common\integrations\vozovoz\VozovozProvider;
use modules\v1\models\PriceForm;

class PriceService
{
    private VozovozProvider $provider;

    public function __construct()
    {
        $this->provider = new VozovozProvider();
    }

    public function getPrice(PriceForm $form): PriceResultDTO
    {
        $dto = $this->getVozovozDTO($form);
        return $this->provider->getPrice($dto);
    }

    private function getVozovozDTO(PriceForm $form): PriceDTO
    {
        $from = new VozovozDispatchDTO(['point' => $form->from->toArray()]);
        $to = new VozovozDestinationDTO(['point' => $form->from->toArray()]);
        $gateway = new VozovozGatewayDTO(['dispatch' => $from, 'destination' => $to]);
        $cargo = new VozovozCargoDTO(['dimension' => $form->toArray()]);

        return new PriceDTO(['params' => new VozovozPriceParamsDTO([
            'cargo' => $cargo,
            'gateway' => $gateway
        ])]);
    }
}