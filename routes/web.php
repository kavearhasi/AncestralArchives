<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use Doctrine\DBAL\Logging\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'prevent-back-button'], function () {

    

    Route::middleware('auth')->name('pages.')->group(function () {
        
        Route::get('/about', function () {
            return view('pages.about');
        })->name('about');
        Route::get('/home', [HomeController::class, 'index'])->name('index');
       
        Route::get('/blog-single', function () {
            return view('pages.blog-single');
        })->name('blog-post');
        Route::get('/causes', function () {
            return view('pages.causes');
        })->name('causes');
        Route::get('/help', function () {
            return view('pages.help');
        })->name('help');
        Route::get('/gallery', function () {
            return view('pages.gallery');
        })->name('gallery');

        Route::get('/contact', function () {
            return view('pages.contact');
        })->name('contacts');
        Route::get('/user/dashboard', function () {
            return view('pages.user-pages.dashboard');
        })->name('dashboard');

        Route::get('/blog',[BlogController::class ,'index'])->name('blogs');
        Route::get('/event', [EventController::class, 'index'])->name('events');
        Route::post('/event/search', [EventController::class, 'search'])->name('event-search');
        Route::get('/allShops', [ShopController::class, 'allShops'])->name('shops');
        Route::get('/Shops/single/{id}', [ShopController::class, 'shopSingle'])->name('shops-single');
        Route::post('/Shops/search', [ShopController::class, 'Shopsearch'])->name('shop-search');
        Route::prefix('/user')->name('user.')->group(function () {
            //Shops ROutes
            Route::get('/my-shops', [ShopController::class, 'showMyShops'])->name('my-shops');
            Route::get('/add-shops/form', [ShopController::class, 'addshop'])->name('add-shop');
            Route::post('/add-shops/save', [ShopController::class, 'storeShop'])->name('store-shop');
            Route::get('/edit-shop/{id}', [ShopController::class, 'editShop'])->name('edit-shop');
            Route::put('/update-shop/{id}', [ShopController::class, 'updateShop'])->name('update-shop');
            Route::get('/delete-shop/{id}', [ShopController::class, 'destroyShop'])->name('destroy-shop');
            Route::get('/edit-items/{id}', [ProductController::class, 'editItemShow'])->name('edit-items');
            Route::post('/add-item', [ProductController::class, 'addItem'])->name('add-item');
            Route::get('/delete-item/{shopId}/{id}', [ProductController::class, 'destroyItem'])->name('destroy-item');

            // Events Routes
            Route::get('/my-events', [EventController::class, 'ShowMyEvents'])->name('my-events');
            Route::get('/add-events/form', [EventController::class, 'create'])->name('add-events');
            Route::post('/add-events/save', [EventController::class, 'store'])->name('store-event');
            Route::get('/edit/event/{id}', [EventController::class, 'edit'])->name('edit-event');
            Route::post('/update/event/{id}',[EventController::class, 'update'])->name('update-event');
            Route::get('/delete/event/{id}', [EventController::class, 'destroy'])->name('destroy-event');

            //Blog Routes
            Route::get('/my-blogs', [BlogController::class, 'showMyBlogs'])->name('my-blogs');
            Route::get('/add-blog/form', [BlogController::class, 'create'])->name('add-blog');
            Route::post('/add-blog/save', [BlogController::class, 'store'])->name('store-blog');
            Route::get('/edit/blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');
            Route::post('/update/blog/{id}', [BlogController::class, 'update'])->name('update-blog');
            Route::get('/delete/blog/{id}', [BlogController::class, 'destroy'])->name('destroy-blog');
            Route::get('/blog/single/{id}', [BlogController::class, 'show'])->name('blog-single');


        });
        Route::prefix('/admin')->name('admin.')->group(function () {
            Route::get('/users', [AdminController::class, 'index'])->name('users');
            Route::get('/shop/activity/{id}', [AdminController::class, 'shopActivity'])->name('shop-activity');
            Route::get('/delete/shop/activity/{id}', [AdminController::class, 'destroyShopActivity'])->name('destroy-shop-activity');
            Route::get('/shop/approval/{status}/{id}', [AdminController::class, 'shopApproval'])->name('shop-approval');
            Route::get('/event/activity/{id}', [AdminController::class, 'eventActivity'])->name('event-activity');
            Route::get('/delete/event/activity/{id}', [AdminController::class, 'destroyEventActivity'])->name('destroy-event-activity');
            Route::get('admin/access/{id}', [AdminController::class, 'adminAccess'])->name('admin-access');
            Route::get('admin/access/remove/{id}', [AdminController::class, 'removAccess'])->name('admin-remove');
            Route::get('shop/approve/{id}/{status}',[AdminController::class,'shopSingleApproval'])->name('approve-shop');
            Route::get('event/approve/{id}/{status}',[AdminController::class,'eventpSingleApproval'])->name('approve-event');
            Route::get('blog/activity/{id}',[AdminController::class,'blogActivity'])->name('blog-activity');
            Route::get('blog/approve/{id}/{status}',[AdminController::class,'blogSingleApproval'])->name('approve-blog');


        });
    });
    //------------------------------------------------------------------------------------------------


    //Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
require __DIR__ . '/auth.php';
