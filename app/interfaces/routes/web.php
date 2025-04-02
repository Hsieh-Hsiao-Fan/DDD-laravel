<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('members')->group(function () {
    Route::controller(MemberController::class)->group(function () {
        Route::get('/', 'create');
    });
});
