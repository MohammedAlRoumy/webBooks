<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
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

/*Route::get('/403', function () {
    return view('errors.403');
});*/

Route::prefix('admin')->group(function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');


    Route::middleware(['auth:admin'])->group(function () {

        Route::get('', [DashboardController::class, 'index'])->middleware(['permission:view_dashboard'])->name('dashboard.index');

        Route::prefix('')->group(function () {
//            Route::resource('admins', AdminController::class);
            Route::get('admins', [AdminController::class, 'index'])->middleware(['permission:view_admins'])->name('admins.index');
            Route::get('admins/create', [AdminController::class, 'create'])->middleware(['permission:add_admins'])->name('admins.create');
            Route::post('admins', [AdminController::class, 'store'])->middleware(['permission:add_admins'])->name('admins.store');
            Route::get('admins/{id}/edit', [AdminController::class, 'edit'])->middleware(['permission:edit_admins'])->name('admins.edit');
            Route::put('admins/{id}', [AdminController::class, 'update'])->middleware(['permission:edit_admins'])->name('admins.update');

            Route::post('admins/delete', [AdminController::class, 'delete'])->middleware(['permission:delete_admins'])->name('admins.delete');
            //   Route::post('admins/status', [CategoryController::class,'status'])->name('categories.status');

            Route::get('admins/{id}/profile/edit', [AdminController::class, 'editProfile'])->name('admins.editProfile');
            Route::put('admins/{id}/profile', [AdminController::class, 'updateProfile'])->name('admins.updateProfile');

        });

        Route::prefix('')->group(function () {

            Route::get('roles', [RoleController::class, 'index'])->middleware(['permission:view_roles'])->name('roles.index');
            Route::get('roles/create', [RoleController::class, 'create'])->middleware(['permission:add_roles'])->name('roles.create');
            Route::post('roles', [RoleController::class, 'store'])->middleware(['permission:add_roles'])->name('roles.store');
            Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->middleware(['permission:edit_roles'])->name('roles.edit');
            Route::put('roles/{id}', [RoleController::class, 'update'])->middleware(['permission:edit_roles'])->name('roles.update');

            Route::post('roles/delete', [RoleController::class, 'delete'])->middleware(['permission:delete_roles'])->name('roles.delete');

        });

        Route::prefix('')->group(function () {
            Route::get('categories', [CategoryController::class, 'index'])->middleware(['permission:view_categories'])->name('categories.index');
            Route::get('categories/create', [CategoryController::class, 'create'])->middleware(['permission:add_categories'])->name('categories.create');
            Route::post('categories', [CategoryController::class, 'store'])->middleware(['permission:add_categories'])->name('categories.store');
            Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->middleware(['permission:edit_categories'])->name('categories.edit');
            Route::put('categories/{id}', [CategoryController::class, 'update'])->middleware(['permission:edit_categories'])->name('categories.update');

            Route::post('categories/delete', [CategoryController::class, 'delete'])->middleware(['permission:delete_categories'])->name('categories.delete');
            Route::post('categories/status', [CategoryController::class, 'status'])->middleware(['permission:activate_categories'])->name('categories.status');

        });


        Route::prefix('')->group(function () {
            Route::get('authors', [AuthorController::class, 'index'])->middleware(['permission:view_authors'])->name('authors.index');
            Route::get('authors/create', [AuthorController::class, 'create'])->middleware(['permission:add_authors'])->name('authors.create');
            Route::post('authors', [AuthorController::class, 'store'])->middleware(['permission:add_authors'])->name('authors.store');
            Route::get('authors/{id}/edit', [AuthorController::class, 'edit'])->middleware(['permission:edit_authors'])->name('authors.edit');
            Route::put('authors/{id}', [AuthorController::class, 'update'])->middleware(['permission:edit_authors'])->name('authors.update');

            Route::post('authors/delete', [AuthorController::class, 'delete'])->middleware(['permission:delete_authors'])->name('authors.delete');
            Route::post('authors/status', [AuthorController::class, 'status'])->middleware(['permission:activate_authors'])->name('authors.status');
        });

        Route::prefix('')->group(function () {
            Route::get('books', [BookController::class, 'index'])->middleware(['permission:view_books'])->name('books.index');
            Route::get('books/create', [BookController::class, 'create'])->middleware(['permission:add_books'])->name('books.create');
            Route::post('books', [BookController::class, 'store'])->middleware(['permission:add_books'])->name('books.store');
            Route::get('books/{id}/edit', [BookController::class, 'edit'])->middleware(['permission:edit_books'])->name('books.edit');
            Route::put('books/{id}', [BookController::class, 'update'])->middleware(['permission:edit_books'])->name('books.update');
            Route::post('books/delete', [BookController::class, 'delete'])->middleware(['permission:delete_books'])->name('books.delete');
            Route::post('books/status', [BookController::class, 'status'])->middleware(['permission:activate_books'])->name('books.status');
        });

        Route::prefix('')->group(function () {
            Route::get('privacy_and_policy', [SettingController::class, 'getPolicy'])->middleware(['permission:view_policies|add_policies|edit_policies|delete_policies|activate_policies'])->name('settings.getPolicy');
            Route::post('books/privacy_and_policy', [SettingController::class, 'postPolicy'])->middleware(['permission:view_policies|add_policies|edit_policies|delete_policies|activate_policies'])->name('settings.postPolicy');
        });

        Route::prefix('')->group(function () {
            Route::get('contact_us', [ContactUsController::class, 'index'])->middleware(['permission:view_contacts'])->name('contact_us.index');
            Route::post('contact_us', [ContactUsController::class, 'delete'])->middleware(['permission:delete_contacts'])->name('contact_us.delete');
        });

        Route::prefix('')->group(function () {
            Route::get('copyrights', [SettingController::class, 'getCopyrights'])->middleware(['permission:view_copyrights|add_copyrights|edit_copyrights|delete_copyrights|activate_copyrights'])->name('settings.getCopyrights');
            Route::post('copyrights', [SettingController::class, 'postCopyrights'])->middleware(['permission:view_copyrights|add_copyrights|edit_copyrights|delete_copyrights|activate_copyrights'])->name('settings.postCopyrights');
        });


        Route::prefix('')->group(function () {
            Route::get('our_mission', [SettingController::class, 'getMission'])->middleware(['permission:view_our_mission|add_our_mission|edit_our_mission|delete_our_mission|activate_our_mission'])->name('settings.getMission');
            Route::post('our_mission', [SettingController::class, 'postMission'])->middleware(['permission:view_our_mission|add_our_mission|edit_our_mission|delete_our_mission|activate_our_mission'])->name('settings.postMission');
        });


        Route::prefix('')->group(function () {
            Route::get('publish', [SettingController::class, 'getPublish'])->middleware(['permission:view_publish|add_publish|edit_publish|delete_publish|activate_publish'])->name('settings.getPublish');
            Route::post('publish', [SettingController::class, 'postPublish'])->middleware(['permission:view_publish|add_publish|edit_publish|delete_publish|activate_publish'])->name('settings.postPublish');
        });

        Route::prefix('')->group(function () {
            Route::get('settings', [SettingController::class, 'getSettings'])->middleware(['permission:view_settings|add_settings|edit_settings|delete_settings|activate_settings'])->name('settings.getSettings');
            Route::post('settings', [SettingController::class, 'postSettings'])->middleware(['permission:view_settings|add_settings|edit_settings|delete_settings|activate_settings'])->name('settings.postSettings');
        });


        Route::prefix('')->group(function () {
            Route::get('comments', [CommentController::class, 'index'])->middleware(['permission:view_comments'])->name('comments.index');
            Route::post('comments/delete', [CommentController::class, 'delete'])->middleware(['permission:delete_comments'])->name('comments.delete');
            Route::post('comments/status', [CommentController::class, 'status'])->middleware(['permission:activate_comments'])->name('comments.status');

        });

        Route::prefix('')->group(function () {
            Route::get('users', [UserController::class, 'index'])->middleware(['permission:view_users'])->name('users.index');
            Route::get('users/create', [UserController::class, 'create'])->middleware(['permission:add_users'])->name('users.create');
            Route::post('users', [UserController::class, 'store'])->middleware(['permission:add_users'])->name('users.store');
            Route::get('users/{id}/edit', [UserController::class, 'edit'])->middleware(['permission:edit_users'])->name('users.edit');
            Route::put('users/{id}', [UserController::class, 'update'])->middleware(['permission:edit_users'])->name('users.update');
            Route::post('users/delete', [UserController::class, 'delete'])->middleware(['permission:delete_users'])->name('users.delete');
            //   Route::post('admins/status', [CategoryController::class,'status'])->name('categories.status');

        });

    });

});


Route::prefix('')->group(function () {

//        Route::get('', [DashboardController::class, 'index'])->middleware(['permission:view_dashboard'])->name('dashboard.index');
    Route::get('', function () {
        return view('site.index');
    })->name('site.index');

    Route::get('books', function () {
        return view('site.books');
    })->name('site.books');

    Route::post('', [App\Http\Controllers\Site\ContactUsController::class, 'contactusAdd'])->name('contactus');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
