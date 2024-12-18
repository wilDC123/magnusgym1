<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\WorkshiftController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;





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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::resource('clients', ClientController::class);
Route::resource('plans', PlanController::class);
Route::resource('workshifts', WorkshiftController::class);
Route::resource('trainers', TrainerController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('payments', PaymentController::class);
Route::resource('users', UserController::class);





