<?php

namespace common\integrations\vozovoz;

use Spatie\DataTransferObject\DataTransferObject;
use yii\httpclient\Client;
use yii\httpclient\Response;

class VozovozDriver
{
    private Client $client;
    private string $token;

    public function __construct()
    {
        $this->client = new Client(['baseUrl' => \Yii::$app->params['integrations']['vozovoz']['base_url']]);
        $this->token = \Yii::$app->params['integrations']['vozovoz']['token'];
    }

    /**
     * @param DataTransferObject|null $dto
     * @return Response
     * @throws \yii\httpclient\Exception
     */
    public function request(?DataTransferObject $dto): Response
    {
        return $this->client
            ->post('/?token=' . $this->token, $dto?->toArray())
            ->setFormat(Client::FORMAT_JSON)
            ->send();
    }
}