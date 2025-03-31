<?php

namespace App\Infrastructure\Repositories\Property;

use App\Domains\Property\Aggregates\PropertyAggregate;
use App\Domains\Property\Entities\PropertyEntity;
use App\Domains\Property\Factories\PropertyFactory;
use App\Domains\Property\Repositories\PropertyRepository as PropertyRepositoryInterface;
use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface
{

    public function findById(string $id): ?PropertyEntity
    {
        $property = Property::find($id);

        //核心子領域(複雜的聚合跟)用Factory 實現創建領域物件
        return PropertyFactory::fromEloquent($property);

        //偷懶一點可以用Entity創建，但職責混淆，Entity主要職責是封裝業務邏輯和狀態
    }

    public function findAggregateById(string $id):PropertyAggregate
    {
        $property = Property::find($id);
        return PropertyFactory::createAggregate($property);
    }
}