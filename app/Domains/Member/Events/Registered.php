<?php

namespace App\Domains\Member\Events;

use App\Domains\Member\ValueObjects\EmailVO;

class Registered
{
    public function __construct(
        public readonly string $id,
        public readonly EmailVO $email,
        public readonly string $name
    ) {
    }
}