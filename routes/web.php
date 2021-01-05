<?php

use App\Http\Controllers\ProspectController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('prospect-lists', [ProspectController::class, 'index'])->name('prospect-lists');
Route::middleware(['auth:sanctum', 'verified'])->get('prospect-lists/create', [ProspectController::class, 'create'])->name('prospect-lists.create');
Route::middleware(['auth:sanctum', 'verified'])->get('prospect-lists/{prospectList}/edit', [ProspectController::class, 'edit'])->name('prospect-lists.edit');
Route::middleware(['auth:sanctum', 'verified'])->get('prospect-lists/{prospectList}/show', [ProspectController::class, 'show'])->name('prospect-lists.show');
Route::middleware(['auth:sanctum', 'verified'])->get('prospect-lists/{prospectList}/delete', [ProspectController::class, 'delete'])->name('prospect-lists.delete');

