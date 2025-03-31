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
        private EmailVO $email,
        private string $passpord,
    ) {
    }

    public static function register(EmailVO $email, string $name, string $passpord): self
    {
        $id = Uuid::uuid4()->toString();
        $memberEntity = new self(
            id: $id,
            email: $email,
            name: $name,
            passpord: $passpord
        );

        // 記錄領域事件（由聚合根負責）
        $memberEntity->recordThat(new Registered($id, $email, $name));

        return $memberEntity;
    }

    protected function recordThat($event)
    {
        $this->recordedEvents[] = $event;
    }

    public function releaseEvents()
    {
        $events = $this->recordedEvents;
        $this->recordedEvents = [];
        return $events;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): EmailVO
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->passpord;
    }
}


