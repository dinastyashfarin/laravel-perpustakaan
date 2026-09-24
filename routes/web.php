<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::resource('members', MemberController::class);
