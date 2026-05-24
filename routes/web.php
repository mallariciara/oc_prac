<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    //student management
    Route::get('employees', [\App\Http\Controllers\studentmngtController::class, 'index'])->name('employees.index');
    Route::get('employees/create', [\App\Http\Controllers\studentmngtController::class, 'create'])->name('employees.create');

    Route::post('employees', [\App\Http\Controllers\studentmngtController::class, 'store'])->name('employees.store');
    Route::put('employees/{id}/edit', [\App\Http\Controllers\studentmngtController::class, 'edit'])->name('employees.edit');

    Route::put('employees/{id}', [\App\Http\Controllers\studentmngtController::class, 'update'])->name('employees.update');
    Route::delete('employees/{id}/delete', [\App\Http\Controllers\studentmngtController::class, 'destroy'])->name('employees.destroy');

});
