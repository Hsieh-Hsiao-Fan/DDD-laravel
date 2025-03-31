<?php

namespace App\Infrastructure\Repositories;

use App\Domains\Member\Entities\MemberEntity;
use App\Domains\Member\Repositories\MemberRepository as MemberRepositoryInterface;
use App\Models\Member as MemberModel;

/**
 * 存放資料庫存取的具體實現
 */
class MemberRepository implements MemberRepositoryInterface
{
    public function save(MemberEntity $member): void
    {
        MemberModel::create([
            'id' => $member->getId(),
            'email' => $member->getEmail(),
            'name' => $member->getName(),
            'password' => $member->getPassword(),
        ]);
    }

    public function findByEmail(string $email): ?MemberEntity
    {
        $memberModel = MemberModel::where('email', $email)->first();

        if (!$memberModel) {
            return null;
        }

        return new MemberEntity(
            $memberModel->id,
            $memberModel->email,
            $memberModel->name,
            $memberModel->password
        );
    }
}