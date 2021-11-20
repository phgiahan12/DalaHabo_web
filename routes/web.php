<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\PlaceController;



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
        Route::delete('destroy/services', [UploadController::class, 'destroy']);

        #Upload Gallery
        Route::post('upload-gallery/services', [GalleryController::class, 'store']);

        #Gallery
        Route::prefix('galleries')->group(function () {

            Route::get('all', [GalleryController::class, 'all']);
            Route::get('create', [GalleryController::class, 'create']);
            Route::post('create', [GalleryController::class, 'store']);
            Route::get('edit/{slider}', [GalleryController::class, 'show']);
            Route::post('edit/{slider}', [GalleryController::class, 'update']);
            Route::delete('destroy', [GalleryController::class, 'destroy']);
        });
        

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

        #Địa điểm
        Route::prefix('places')->group(function () {

            Route::get('all', [PlaceController::class, 'all']);
            Route::get('create', [PlaceController::class, 'create']);
            Route::post('create', [PlaceController::class, 'store']);
            Route::get('edit/{place}', [PlaceController::class, 'show']);
            Route::post('edit/{place}', [PlaceController::class, 'update']);
            Route::delete('destroy', [PlaceController::class, 'destroy']);
        });

        #Hướng dẫn viên


        #Khách hàng


        #Yêu cầu thuê


        #Bài viết và bình luận


        #Tài khoản
        
        
    });
});
