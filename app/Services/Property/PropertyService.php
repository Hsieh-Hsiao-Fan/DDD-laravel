<?php

namespace App\Services\Property;

use App\Domains\Property\DTOs\PropertyDTO;
use App\Domains\Property\Repositories\PropertyRepository;
use App\Domains\Property\Services\PropertyService as DomainPropertyService;
use Illuminate\Http\Request;

/*
Application service 可以使用(調用)

1.領域層的聚合根（Aggregate Root）: 當業務邏輯可以完全封裝在單一聚合根內時，應用層服務直接創建或操作聚合根
2.領域層的領域服務（Domain Service）: 當業務邏輯涉及多個聚合、複雜規則或無法封裝在單一聚合根中時，應用層服務呼叫領域服務。
3.領域層的儲存庫（Repository）：需要持久化或查詢時，應用層服務透過儲存庫介面與基礎架構層交互
4.值物件（Value Objects） 應用層服務可能需要創建值物件作為聚合根的輸入。
5.領域事件（Domain Events）:如果使用事件驅動設計，應用層服務可能發佈領域事件。
6.基礎架構層的服務（Infrastructure Services）：需要與外部系統交互（如發送郵件、記錄日志），應用層服務可以呼叫基礎架構層的服務。
*/
class PropertyService
{
    public function __construct(
        private PropertyRepository $propertyRepository
    ) {
    }

    public function getById(string $id)
    {
        $propertyEntity = $this->propertyRepository->findById($id);
    }

    public function store(Request $request)
    {
        $dto = PropertyDTO::fromArray([
            'name' => $request->input('name'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'postalCode' => $request->input('postalCode'),
            'agentName' => $request->input('agentName'),
        ]);

        $propertyAggregate = app(DomainPropertyService::class)->createProperty($dto);
    }
}