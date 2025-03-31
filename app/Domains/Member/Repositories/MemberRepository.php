<?php

namespace App\Domains\Member\Repositories;

use App\Domains\Member\Entities\MemberEntity;

interface MemberRepository
{
    public function save(MemberEntity $member): void;

    /**
     * @param string $email
     * @return 
     */
    public function findByEmail(string $email): ?MemberEntity;
}
