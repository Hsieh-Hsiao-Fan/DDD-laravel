<?php

namespace App\Domains\Property\Entities;

use App\Domains\Property\ValueObjects\AddressVO;

class PropertyEntity
{
    public function __construct(
        private string $name,
        private AddressVO $addressVO,
    ) {
    }
}