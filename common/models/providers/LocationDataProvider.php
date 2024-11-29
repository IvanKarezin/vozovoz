<?php

namespace common\models\providers;

use common\integrations\vozovoz\DTO\LocationDTO;
use common\integrations\vozovoz\DTO\LocationResultDTO;
use common\models\Location;
use yii\base\Exception;
use yii\data\BaseDataProvider;
use common\integrations\vozovoz\VozovozProvider;
class LocationDataProvider extends BaseDataProvider
{
    private VozovozProvider $provider;
    private ?string $search = null;
    private array $locationEntities;

    public function __construct($config = [])
    {
        if(!empty($config['search']))
        {
            $this->search = $config['search'];
        }
        $this->provider = new VozovozProvider();

        parent::__construct();
    }

    /** @inheritDoc */
    public function init()
    {
        parent::init();

        $this->locationEntities = empty($this->search)
            ? $this->provider->searchLocations(new LocationDTO())
            : $this->provider->searchLocations(new LocationDTO(['params' => ['search' => $this->search]]));
    }

    /** @inheritDoc */
    public function prepareModels()
    {
        $models = [];
        $pagination = $this->getPagination();

        if($pagination)
        {
            foreach ($this->locationEntities as $location)
            {
                $models[] = $this->createLocationModel($location);
            }

            return $models;
        }

        $pagination->totalCount = $this->getTotalCount();
        $limit = $this->pagination->getLimit();
        $seek = $this->pagination->getOffset();

        for($i = $seek; $i < $limit; $i++)
        {
            $models[] = $this->createLocationModel($this->locationEntities[$i]);
        }

        return $models;
    }

    /** @inheritDoc */
    public function prepareKeys($models)
    {
        $keys = [];

        foreach ($models as $model)
        {
            $keys[] = $model->guid;
        }

        return $keys;
    }

    /** @inheritDoc */
    public function prepareTotalCount()
    {
        return sizeof($this->locationEntities);
    }

    private function createLocationModel(LocationResultDTO $data): Location
    {
        $model = new Location();
        $model->load($data->toArray(), '');

        if($model->validate())
        {
            return $model;
        }
        throw new Exception(implode('<br />', $model->errors));
    }
}