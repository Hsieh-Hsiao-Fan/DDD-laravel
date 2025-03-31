<?php

namespace App\Services\Member;

use App\Domains\Member\Entities\MemberEntity;
use App\Domains\Member\ValueObjects\EmailVO;
use App\Domains\Member\Repositories\MemberRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;

class MemberService
{
    public function __construct(
        private MemberRepository $memberRepository
    ) {
    }

    public function createMember(string $name, string $email, string $password): MemberEntity
    {
        $member = MemberEntity::register(
            email: new EmailVO($email),
            name: $name,
            passpord: Hash::make($password)
        );

        $this->memberRepository->save($member);
        
        // 將已經存在的事件傳遞出去，不是生成或觸發事件(這是domain的職責)
        foreach ($member->releaseEvents() as $event) {
            Event::dispatch($event);
        }

        return $member;
    }

    public function getById(string $id)
    {
    }
}