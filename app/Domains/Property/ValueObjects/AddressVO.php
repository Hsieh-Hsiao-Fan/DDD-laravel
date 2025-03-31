<?php

namespace App\Domains\Property\ValueObjects;

class AddressVO
{
    public function __construct(
        private string $street,
        private string $city,
        private string $postalCode
    ) {
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }
}