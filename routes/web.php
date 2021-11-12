<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;

//---------- DalaHabo ----------//
Route::get('/', function () {
    return view('welcome');
});


//---------- DalaHabo Admin ----------//
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

//Require login
Route::middleware(['auth'])->group(function() {
    
    Route::prefix('admin')->group(function() {
        
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('dashboard', [MainController::class, 'index']);

        #Danh mục
        Route::prefix('categories')->group(function() {

            Route::get('all', [CategoryController::class, 'all']);
            
            Route::get('add', [CategoryController::class, 'add']);
            Route::post('add', [CategoryController::class, 'store']);
            Route::delete('destroy', [CategoryController::class, 'destroy']);
        });

    });
    
});
