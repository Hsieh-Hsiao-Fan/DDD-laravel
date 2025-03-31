<?php

namespace App\Domains\Property\Services;

use App\Domains\Property\Aggregates\PropertyAggregate;
use App\Domains\Property\DTOs\PropertyDTO;
use App\Domains\Property\Factories\PropertyFactory;
use App\Domains\Property\Repositories\PropertyRepository;

// 通常不需要介面
// 當業務邏輯無法完全封裝在聚合根中（例如跨聚合的操作，或業務邏輯複雜），才需要定義在 app/Domain/某領域/Services 中。

class PropertyService
{
    public function __construct(
        private PropertyRepository $propertyRepository
    ) {
    }

    public function getPropertyAggregate(string $propertyId)
    {
        return $this->propertyRepository->findAggregateById($propertyId);
    }

    public function getById(string $id)
    {
        $this->propertyRepository->findById($id);
    }

    public function createProperty(PropertyDTO $dto): PropertyAggregate
    {
        $propertyAggregate = PropertyFactory::createFromDTO($dto);

        // $this->propertyRepository->save($propertyAggregate);

        return $propertyAggregate;
    }
}
