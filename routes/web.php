<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/' , function(){
    return 'helllooo';
});
//gameday admin login routes
Route::get('admin/login', [AuthController::class, 'loginView'])->name('admin/login.index');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin/login');

// Route::prefix('admin')->group(function () {
//     Route::get('login', [AuthController::class, 'loginView'])->name('admin/login.index');
//     Route::post('login', [AuthController::class, 'login'])->name('admin/login');
//     // Route::get('register', [AuthController::class, 'registerView'])->name('register.index');
//     // Route::post('register', [AuthController::class, 'register'])->name('register.store');



// });


Route::prefix('admin')->middleware('auth:superadmin')->group(function () {
// Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin/dashboard');
});
