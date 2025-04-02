<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Member\MemberService;

class MemberController extends Controller
{
    public function __construct(
    ) {
    }
    
    public function create()
    {
        app(MemberService::class)->createMember('f', 'test2@twhg.com.tw', 123);
    }
}