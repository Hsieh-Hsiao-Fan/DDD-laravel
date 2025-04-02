<?php

namespace App\Domains\Member\Repositories\Contracts;

use App\Domains\Member\Entities\MemberEntity;

interface MemberRepository
{
    public function save(MemberEntity $member);

    /**
     * @param string $email
     * @return 
     */
    public function findByEmail(string $email): ?MemberEntity;
}
