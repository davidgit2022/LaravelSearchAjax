<?php

use App\Http\Controllers\Member\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MemberController::class, 'index'])->name('member');
Route::get('/search', [MemberController::class, 'search'])->name('search');
Route::get('/member/{id}', [MemberController::class, 'viewmember'])->name('viewmember');
Route::post('/find', [MemberController::class, 'find'])->name('find');
