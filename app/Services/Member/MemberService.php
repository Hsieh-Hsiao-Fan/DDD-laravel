<?php

namespace App\Services\Member;

use App\Domains\Member\Services\MemberService as DomainMemberService;

class MemberService
{
    public function __construct(
    ) {
    }

    public function createMember(string $name, string $email, string $password)
    {
        return app(DomainMemberService::class)->register($name, $email, $password);
        
    }

    public function getById(string $id)
    {
    }
}