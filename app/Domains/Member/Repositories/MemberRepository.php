<?php

namespace App\Domains\Member\Repositories;

use App\Domains\Member\Entities\MemberEntity;
use App\Domains\Member\Repositories\Contracts\MemberRepository as MemberRepositoryInterface;
use App\Infrastructure\DB\Member;

/**
 * 存放資料庫存取的具體實現
 */
class MemberRepository implements MemberRepositoryInterface
{
    public function save(MemberEntity $member)
    {
        $memberModel = Member::create([
            'id' => $member->getId(),
            'name' => $member->getName(),
            'email' => $member->getEmail(),
            'password' => $member->getPassword(),
        ]);
    }

    public function findByEmail(string $email): ?MemberEntity
    {
        $member = Member::where('email', $email)->first();

        if (!$member) {
            return null;
        }

        return new MemberEntity(
            $member->id,
            $member->email,
            $member->name,
            $member->password
        );
    }
}