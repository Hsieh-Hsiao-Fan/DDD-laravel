<?php

namespace App\Domains\Member\ValueObjects;

class EmailVO
{
    private string $value;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('無效的電子郵件格式');
        }
        $this->value = $email;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
