<?php

namespace App\Domains\Member\Services;

use App\Domains\Member\Entities\MemberEntity;
use App\Domains\Member\Repositories\MemberRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class MemberService
{
    public function register(string $name, string $email, string $password): ?MemberEntity
    {
        DB::beginTransaction();
        try {
            $member = new MemberEntity(
                id: Uuid::uuid4()->toString(),
                name: $name,
                email: $email,
                passpord: Hash::make(123456)
            );
            
            app(MemberRepository::class)->save($member);

            //觸發領域事件


            DB::commit();

            return $member;
        } catch (\Throwable $th) {

            dd($th);
            DB::rollBack();
        }
    }
}