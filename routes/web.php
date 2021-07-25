<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
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

Route::prefix('admin')->group(function (){

    Route::prefix('')->group(function (){
        Route::resource('admins',AdminController::class);
        Route::post('admins/delete', [AdminController::class,'delete'])->name('admins.delete');
     //   Route::post('admins/status', [CategoryController::class,'status'])->name('categories.status');

    });

    Route::prefix('')->group(function (){
        Route::resource('roles',RoleController::class);
        Route::post('roles/delete', [RoleController::class,'delete'])->name('roles.delete');

    });

    Route::prefix('')->group(function (){
        Route::resource('categories',CategoryController::class);
        Route::post('categories/delete', [CategoryController::class,'delete'])->name('categories.delete');
        Route::post('categories/status', [CategoryController::class,'status'])->name('categories.status');

    });


    Route::prefix('')->group(function (){
        Route::resource('authors',AuthorController::class);
        Route::post('authors/delete', [AuthorController::class,'delete'])->name('authors.delete');
        Route::post('authors/status', [AuthorController::class,'status'])->name('authors.status');
    });

    Route::prefix('')->group(function (){
        Route::resource('books',BookController::class);
        Route::post('books/delete', [BookController::class,'delete'])->name('books.delete');
        Route::post('books/status', [BookController::class,'status'])->name('books.status');
    });

    Route::prefix('')->group(function (){
        Route::get('privacy_and_policy', [SettingController::class,'getPolicy'])->name('settings.getPolicy');
        Route::post('books/privacy_and_policy', [SettingController::class,'postPolicy'])->name('settings.postPolicy');
    });

    Route::prefix('')->group(function (){
        Route::get('contact_us', [ContactUsController::class,'index'])->name('contact_us.index');
        Route::post('contact_us',[ContactUsController::class,'status'])->name('contact_us.delete');
    });

    Route::prefix('')->group(function (){
        Route::get('copyrights', [SettingController::class,'getCopyrights'])->name('settings.getCopyrights');
        Route::post('copyrights', [SettingController::class,'postCopyrights'])->name('settings.postCopyrights');
    });


    Route::prefix('')->group(function (){
        Route::get('our_mission', [SettingController::class,'getMission'])->name('settings.getMission');
        Route::post('our_mission', [SettingController::class,'postMission'])->name('settings.postMission');
    });



    Route::prefix('')->group(function (){
        Route::get('publish', [SettingController::class,'getPublish'])->name('settings.getPublish');
        Route::post('publish', [SettingController::class,'postPublish'])->name('settings.postPublish');
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
