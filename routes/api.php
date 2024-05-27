<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\CollageController;
use App\Http\Controllers\Api\ContactQueryController;
use App\Http\Controllers\Api\ContactUsUserController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/send-otp', [AuthController::class, 'sendOtp']);
Route::post('/check-otp', [AuthController::class, 'checkOtp']);
Route::post('/update-password', [AuthController::class, 'updatePassword']);

Route::get('/get-featured-image', [ImageController::class, 'getFeaturedImage']);
Route::get('/get-category-by-image', [ImageController::class, 'getCategoryByImage']);
Route::get('/get-sub-category-by-image', [ImageController::class, 'getSubCategoryByImage']);
Route::get('/get-category-collage-by-image', [ImageController::class, 'getSCategoryCollageByImage']);
Route::get('/get-natural-wonderland-images', [ImageController::class, 'getNaturalWonderlandImages']);
Route::get('/get-image-detail/{slug}', [ImageController::class, 'getImageDetail']);

Route::post('/submit-contact-query', [ContactQueryController::class, 'submitContactQuery']);
Route::controller(BlogController::class)->group(function () {
    Route::get('/get-all-blogs', 'getBlogAll');
    Route::get('/get-featured-blogs', 'getFeaturedBlog');
    Route::get('/get-blog-detail/{slug}', 'getBlogDetail');
});
Route::middleware('auth:api')->group(function () {
    Route::get('/get-user-info', [AuthController::class, 'getUserInfo']);
    Route::post('/update-user-info', [AuthController::class, 'updateUserInfo']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::controller(ContactUsUserController::class)->group(function () {
        Route::get('/get_all_contact_us_users', 'getAllContactUsUser');
        Route::post('/contact_us_users', 'store');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/get_all_category', 'getAllCategory');
    });

    Route::controller(ImageController::class)->group(function () {
        Route::get('/get_all_image', 'getAllImage');
        Route::post('/image', 'store');
        Route::put('/image/{image}', 'update');
        Route::delete('/image/{image}', 'delete');
        Route::get('/get-wish-list', 'getWishList');
        Route::get('/add-wish-list', 'addWishList');
    });

    Route::controller(CollageController::class)->group(function () {
        Route::get('/get-draft-collage-images', 'getDraftsImage');
        Route::post('/collage', 'store');
        Route::post('/add-collage', 'addCollage');
        Route::get('/edit-draft/{id}', 'editDraft');
        Route::post('/update-draft/{id}', 'updateDraft');
        Route::delete('/delete-draft/{id}', 'deleteCollage');

    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/get-cart', 'getCart');
        Route::get('/get-collage-price', 'collagePrice');
        Route::get('/add-to-cart', 'addToCart');
        Route::post('/update-to-cart/{id}', 'updateCart');
        Route::delete('/delete-to-cart/{id}', 'destroy');
    });
    Route::controller(CheckoutController::class)->group(function () {
        Route::post('/checkout', 'createOrder');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/get-all-orders', 'getOrders');
        Route::get('/get-order-item/{id}', 'getOrderItem');
    });
});
