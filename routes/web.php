<?php

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactUsUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Api\CartController;
use App\Models\Image;
use App\Models\ImageSize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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


// Route::get('/abc', function () {
//     Image::where('category_id', 2)->update([
//         'is_featured' => 1,
//     ]);
// //    return view('admin.authentication.login');
// });
// Route::get('/abc', function () {
//     $affected = DB::table('images')->update([
//         'thumbnail_personal_use_price'   => '7',
//         'thumbnail_corporate_use_price'  => '29',
//         'thumbnail_commercial_use_price' => '69',
//         'standard_personal_use_price'    => '29',
//         'standard_corporate_use_price'   => '349',
//         'standard_commercial_use_price'  => '381',
//     ]);
// });

Route::get('/', function () {

    return view('admin.authentication.login');
});


Route::middleware(['UnAuthenticAdmin'])->group(function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthenticationController::class, 'loginData'])->name('admin.login.data');
});

Route::middleware(['AuthenticAdmin'])->group(function () {
    //authentication route
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

    //dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/manage-sub-categories', 'index')->name('manage.sub.categories');
        Route::get('/create-sub-category', 'create')->name('create.sub.category');
        Route::post('/create-sub-category', 'createData')->name('create.sub.category.data');
        Route::get('/update-sub-category/{subCategoryId}', 'update')->name('update.sub.category');
        Route::post('/update-sub-category/{subCategoryId}', 'updateData')->name('update.sub.category.data');
        Route::get('/delete-sub-category/{subCategoryId}', 'delete')->name('delete.sub.category');
    });
    Route::get('/manage-users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
    Route::get('/users-detail/{id}', [\App\Http\Controllers\Admin\UserController::class, 'userDetail'])->name('admin.user.show');
    Route::post('/user-update', [\App\Http\Controllers\Admin\UserController::class, 'userStatusUpdate'])->name('admin.user.update');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order');
    Route::get('/order-detail/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'orderDetail'])->name('admin.order.show');
    Route::controller(ImageController::class)->group(function () {
        Route::get('/manage-images', 'index')->name('manage.images');
        Route::get('/create-image', 'create')->name('create.image');
        Route::post('/create-image', 'createData')->name('create.image.data');
        Route::get('/update-image/{imageId}', 'update')->name('update.image');
        Route::post('/update-image/{imageId}', 'updateData')->name('update.image.data');
        Route::get('/delete-image/{imageId}', 'delete')->name('delete.image');
    });

    Route::controller(BlogController::class)->group(function () {
        Route::get('/manage-blog', 'index')->name('manage.blog');
        Route::get('/create-blog', 'create')->name('create.blog');
        Route::post('/create-blog', 'store')->name('store.blog');
        Route::get('/edit-blog/{blogId}', 'edit')->name('edit.blog');
        Route::post('/update-blog/{blogId}', 'update')->name('update.blog');
        Route::get('/delete-blog/{blogId}', 'delete')->name('delete.blog');
    });

    Route::controller(ContactUsUserController::class)->group(function () {
        Route::get('/manage-contact-us-users', 'index')->name('manage.contact.us.users');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/add-cart', 'addToCart')->name('add.cart');
    });
    Route::controller(SizeController::class)->group(function () {
        Route::get('/manage-size', 'index')->name('manage.sizes');
        Route::get('/create-size', 'create')->name('create.size');
        Route::post('/create-size', 'store')->name('create.size.data');
        Route::get('/update-size/{sizeId}', 'edit')->name('update.size');
        Route::post('/update-size/{sizeId}', 'update')->name('update.size.data');
        Route::get('/delete-size/{sizeId}', 'delete')->name('delete.image');
    });
});
