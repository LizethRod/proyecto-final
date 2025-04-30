<?php

use App\Http\Controllers\BranchesController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 

Route::get('/', function () {
    return view('modules.users.login');
})->name('login');

Route::get('/content', function () {
    return view('modules.start');
})->name("start");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('first-user', [UserController::class, 'firstUser']);

// Sucursales
Route::get('/branches', [BranchesController::class, 'index'])->name('branches.index');
Route::get('/branches/create', [BranchesController::class, 'create'])->name('branches.create');
Route::post('/branches', [BranchesController::class, 'store'])->name('branches.store');
Route::get('/branches/{id}', [BranchesController::class, 'show'])->name('branches.show');
Route::get('/branches/{id}/edit', [BranchesController::class, 'edit'])->name('branches.edit');
Route::put('/branches', [BranchesController::class, 'update'])->name('branches.update');
Route::get('/branches/{state}/{id_branch}', [BranchesController::class, 'changeState'])->name('branches.changeState');
Route::delete('/branches/{id}', [BranchesController::class, 'destroy'])->name('branches.destroy');
