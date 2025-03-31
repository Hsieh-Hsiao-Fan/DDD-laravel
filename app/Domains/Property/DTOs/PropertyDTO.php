<?php

namespace App\Domains\Property\DTOs;

class PropertyDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $street,
        public readonly string $city,
        public readonly string $postalCode,
        public readonly string $agentName,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            street: $data['street'],
            city: $data['city'],
            postalCode: $data['postalCode'],
            agentName: $data['agentName'],
        );
    }
}