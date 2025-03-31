<?php

namespace App\Domains\Property\Repositories;

use App\Domains\Property\Aggregates\PropertyAggregate;
use App\Domains\Property\Entities\PropertyEntity;

interface PropertyRepository{
    /**
     * @param string $id
     * @return PropertyEntity
     */
    public function findById(string $id): ?PropertyEntity;

    public function findAggregateById(string $id): PropertyAggregate;
}