<?php

namespace App\Domains\Member\Entities;

use App\Domains\Member\Events\Registered;
use App\Domains\Member\ValueObjects\EmailVO;
use Ramsey\Uuid\Uuid;

//領域事件（Domain Events）的發出通常是由**領域模型（Domain Model）或聚合根（Aggregate Root）**負責
class MemberEntity
{
    protected $recordedEvents = [];

    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $passpord,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->passpord;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}


