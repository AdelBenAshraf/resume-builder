<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullstackResumeController;

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

Route::get('resumes', [FullstackResumeController::class, 'index']);
Route::get('resumes/{id}', [FullstackResumeController::class, 'show']);
Route::get('resumes/delete/{id}', [FullstackResumeController::class, 'destroy']);
Route::get('createresume', [FullstackResumeController::class, 'create']);
Route::post('createresume', [FullstackResumeController::class, 'store']);
Route::get('editresume/{id}', [FullstackResumeController::class, 'edit']);
Route::put('editresume', [FullstackResumeController::class, 'update']);
