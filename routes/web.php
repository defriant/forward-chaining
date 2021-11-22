<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('user.index');
    });
    Route::get('/ketentuan', function () {
        return view('user.rules');
    });
    Route::get('/identitas', function () {
        return view('user.identitas');
    });
    Route::get('/analisa', function () {
        return redirect('/');
    });
    Route::post('/analisa', [WebController::class, 'analisa']);
    Route::post('/process', [WebController::class, 'process']);
    Route::get('/analisa/{id}', [WebController::class, 'hasil_analisa']);

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login-attempt', [AdminController::class, 'login_attempt']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::post('/hasil-rekomendasi', [AdminController::class, 'hasil_rekomendasi']);

    Route::get('/admin/goal', [AdminController::class, 'goal']);
    Route::post('/admin/goal', [AdminController::class, 'get_goal']);
    Route::post('/admin/goal-relasi', [AdminController::class, 'goal_relasi']);
    Route::post('/admin/goal/update', [AdminController::class, 'goal_update']);
    Route::post('/admin/goal/add', [AdminController::class, 'goal_add']);
    Route::post('/admin/goal/delete', [AdminController::class, 'goal_delete']);

    Route::get('/admin/pertanyaan', [AdminController::class, 'pertanyaan']);
    Route::post('/admin/pertanyaan', [AdminController::class, 'get_pertanyaan']);
    Route::post('/admin/pertanyaan-relasi', [AdminController::class, 'pertanyaan_relasi']);
    Route::post('/admin/pertanyaan/update', [AdminController::class, 'pertanyaan_update']);
    Route::post('/admin/pertanyaan/add', [AdminController::class, 'pertanyaan_add']);
    Route::post('/admin/pertanyaan/delete', [AdminController::class, 'pertanyaan_delete']);

    Route::get('/logout', [AdminController::class, 'logout']);
});
