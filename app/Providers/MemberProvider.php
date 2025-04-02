<?php

namespace App\Providers;

use App\Domains\Member\Repositories\MemberRepository;
use App\Domains\Member\Repositories\Contracts\MemberRepository as MemberRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class MemberProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    private $contracts;
    public function register()
    {
        $this->app->singleton(MemberRepositoryInterface::class, MemberRepository::class);
    }

    public function provides()
    {
        return [MemberRepositoryInterface::class];
    }
}
