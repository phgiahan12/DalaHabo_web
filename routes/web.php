<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UploadController;



//---------- DalaHabo ----------//
Route::get('/', function () {
    return view('welcome');
});


//---------- DalaHabo Admin ----------//
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

//Require login
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('dashboard', [MainController::class, 'index']);

        #Đăng xuất
        Route::get('logout', [LoginController::class, 'logout']);

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        #Slider
        Route::prefix('sliders')->group(function () {

            Route::get('all', [SliderController::class, 'all']);
            Route::get('create', [SliderController::class, 'create']);
            Route::post('create', [SliderController::class, 'store']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        #Danh mục
        Route::prefix('categories')->group(function () {

            Route::get('all', [CategoryController::class, 'all']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'store']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::delete('destroy', [CategoryController::class, 'destroy']);
        });
    });
});
