<?php

namespace App\Domains\Property\Aggregates;

use App\Domains\Agent\Entities\AgentEntity;
use App\Domains\Property\Entities\PropertyEntity;

//一組相關實體，在資料變更時被視為一個單元
class PropertyAggregate
{
    public function __construct(
        private PropertyEntity $propertyEntity,
        private AgentEntity $agentEntity,
    ) {
    }
}
