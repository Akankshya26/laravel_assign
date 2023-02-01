<?php

use App\Http\Controllers\AccountControlle;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileControlle;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout ');
});
//Route::get('list', [AuthController::class, 'index'])->name('index');

Route::get('list', [AuthController::class, 'list'])->name('list');
Route::get('/edit/{id}', [AuthController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [AuthController::class, 'update'])->name('update');
Route::get('/delete_l/{id}', [AuthController::class, 'destroy'])->name('destroy');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::get('sidebar', [AuthController::class, 'sidebar'])->name('sidebar');
Route::get('footer', [AuthController::class, 'footer'])->name('footer');


//
Route::get('/pedit/{id}', [AuthController::class, 'pedit'])->name('pedit');
Route::put('/pedit/{id}', [AuthController::class, 'pupdate'])->name('pupdate');

//account
Route::get('account', [AccountControlle::class, 'acc_view'])->name('account');
Route::post('account', [AccountControlle::class, 'account'])->name('account');
//edit acc
Route::get('/accountedit/{id}', [AccountControlle::class, 'aedit'])->name('accountedit');
Route::put('/accountedit/{id}', [AccountControlle::class, 'aupdate'])->name('accountupdate');
//delete acc
Route::get('/delete/{id}', [AccountControlle::class, 'destroy'])->name('destroy');
//add account button
Route::get('/addaccount', [AccountControlle::class, 'addaccount']);

//Transaction
Route::get('transaction', [AccountControlle::class, 'view_transaction'])->name('transaction');
Route::post('transaction', [AccountControlle::class, 'add_transaction'])->name('transaction');
//update transaction
Route::get('/edit-transaction/{id}', [AccountControlle::class, 't_edit'])->name('edit-transaction');
Route::put('/edit-transaction/{id}', [AccountControlle::class, 't_update'])->name('edit-transaction');
//Delete Transaction
Route::get('/delete-transaction/{id}', [AccountControlle::class, 'destroy_transaction'])->name('delete-transaction');
