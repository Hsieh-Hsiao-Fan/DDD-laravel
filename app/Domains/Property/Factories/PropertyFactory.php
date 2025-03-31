<?php

namespace App\Domains\Property\Factories;

use App\Domains\Property\Aggregates\PropertyAggregate;
use App\Domains\Property\DTOs\PropertyDTO;
use App\Domains\Property\Entities\PropertyEntity;
use App\Domains\Property\ValueObjects\AddressVO;
use App\Models\Property;
use App\Domains\Agent\Entities\AgentEntity;
/*
複雜的聚合根創建：當聚合根需要多個參數、子物件（如值物件或實體），或有特定業務規則時。
重建物件：從持久化儲存（如資料庫）重建聚合根時，Factory 可以將原始數據轉換為領域模型。

1.核心子領域用Factory
2.通用子領域或支持子領域可以用PropertyEntity::fromEloquent，或只有幾個基本屬性，無需驗證）
直接用 new Order() 即可，不必引入 Factory
 */
class PropertyFactory
{
    public static function fromEloquent(?Property $property): ?PropertyEntity
    {
        if (is_null($property)) {
            return null;
        }
        return new PropertyEntity(
            name: $property->name,
            addressVO: new AddressVO(
                street: '',
                city: '',
                postalCode: '',
            )
        );
    }

    // 創建 PropertyAggregate
    public static function createAggregate(
        ?Property $property
    ): PropertyAggregate {
        $propertyEntity = self::fromEloquent($property);
        $agentEntity = new AgentEntity($property->agent->name);

        return new PropertyAggregate(
            propertyEntity: $propertyEntity,
            agentEntity: $agentEntity,
        );
    }

    public static function createFromDTO(PropertyDTO $dto): PropertyAggregate
    {
        // 創建 PropertyEntity
        $propertyEntity = new PropertyEntity(
            name: $dto->name,
            addressVO: new AddressVO(
                street: $dto->street,
                city: $dto->city,
                postalCode: $dto->postalCode,
            ),
        );
        $agentEntity = new AgentEntity($dto->agentName);

        // 創建並回傳 PropertyAggregate
        return new PropertyAggregate(
            propertyEntity: $propertyEntity,
            agentEntity: $agentEntity,
        );
    }
}