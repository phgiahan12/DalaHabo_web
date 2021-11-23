<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\TourguideController;



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
        Route::post('ckeditor/image_upload', [CkeditorController::class, 'upload'])->name('upload');
        Route::get('ckeditor/file_browser', [CkeditorController::class, 'file_browser'])->name('file_browser');

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

            #Gallery
            Route::get('galleries/{place}', [GalleryController::class, 'allPlaceImages']);
            Route::post('galleries/{place}', [GalleryController::class, 'createPlaceImages']);
            Route::delete('galleries/destroy', [GalleryController::class, 'destroyPlaceImages']);
        });

        #Hướng dẫn viên
        Route::prefix('tourguides')->group(function () {

            Route::get('all', [TourguideController::class, 'all']);
            Route::get('create', [TourguideController::class, 'create']);
            Route::post('create', [TourguideController::class, 'store']);
            Route::get('edit/{tourguide}', [TourguideController::class, 'show']);
            Route::post('edit/{tourguide}', [TourguideController::class, 'update']);
            Route::delete('destroy', [TourguideController::class, 'destroy']);

            #Gallery
            Route::get('galleries/{tourguide}', [GalleryController::class, 'allTourguideImages']);
            Route::post('galleries/{tourguide}', [GalleryController::class, 'createTourguideImages']);
            Route::delete('galleries/destroy', [GalleryController::class, 'destroyTourguideImages']);
        });

        #Khách hàng


        #Yêu cầu thuê


        #Bài viết và bình luận


        #Tài khoản
        
        
    });
});
