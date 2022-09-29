<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

// Front & User Interface Routes
Route::get('/', [App\Http\Controllers\front\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\front\PageController::class, 'aboutus']);
Route::get('/contact-us', [App\Http\Controllers\front\PageController::class, 'contact']);
Route::get('/faq', [App\Http\Controllers\front\FaqController::class, 'index']);
Route::get('/blog', [App\Http\Controllers\front\BlogController::class, 'index']);
Route::get('/blog/detail/{id}', [App\Http\Controllers\front\BlogController::class, 'detail']);
Route::get('/news', [App\Http\Controllers\front\BlogController::class, 'news']);
Route::get('/careers', [App\Http\Controllers\front\CareerController::class, 'index']);
Route::get('/news/detail/{id}', [App\Http\Controllers\front\BlogController::class, 'newsDetail']);
Route::get('/product/list/{category_id}', [App\Http\Controllers\front\ProductController::class, 'index']);
Route::post('/product/search/{category_id}', [App\Http\Controllers\front\ProductController::class, 'search']);
Route::get('/product/detail/{name}/{product_id}', [App\Http\Controllers\front\ProductController::class, 'singleProduct']);
Route::post('/subscribe/newsletter', [App\Http\Controllers\front\HomeController::class, 'subscribe']);
Route::get('/nosubscribe/newsletter', [App\Http\Controllers\front\HomeController::class, 'noSubscribe']);
Route::get('/user/register', [App\Http\Controllers\front\HomeController::class, 'register']);

// Admin routes
Route::get('/admin/login', [MainController::class, 'login'])->name('auth.login');
Route::post('/login', [MainController::class, 'doLogin'])->name('auth.dologin');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');
Route::get('/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('/auth/forgot', [MainController::class, 'requestPassword'])->name('auth.forgot');
Route::get('/forgot-password', [MainController::class, 'forgot'])->name('forgot.password');
Route::get('/new-password', [MainController::class, 'newPassword'])->name('new.password');
Route::post('/change-password', [MainController::class, 'changePassword'])->name('change.password');

// latest update

Route::middleware(['checkUserLoggedIn'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/documents', [App\Http\Controllers\DocumentController::class, 'index']);
    Route::get('/document-form', [App\Http\Controllers\DocumentController::class, 'doc_add']);
    Route::post('/document/store', [App\Http\Controllers\DocumentController::class, 'doc_store']);
    Route::get('/document/edit/{id}', [App\Http\Controllers\DocumentController::class, 'doc_edit']);
    Route::get('/document/delete/{id}', [App\Http\Controllers\DocumentController::class, 'doc_delete']);
    Route::get('/document/active/{id}', [App\Http\Controllers\DocumentController::class, 'doc_active']);
    Route::get('/document/deactive/{id}', [App\Http\Controllers\DocumentController::class, 'doc_deactive']);

    Route::get('/document/categories', [App\Http\Controllers\DocumentController::class, 'docCategories']);
    Route::get('/doc_category-form', [App\Http\Controllers\DocumentController::class, 'category_add']);
    Route::post('/doc_category/store', [App\Http\Controllers\DocumentController::class, 'category_store']);
    Route::get('/doc_category/edit/{id}', [App\Http\Controllers\DocumentController::class, 'category_edit']);
    Route::get('/doc_category/delete/{id}', [App\Http\Controllers\DocumentController::class, 'category_delete']);
    Route::get('/doc_category/active/{id}', [App\Http\Controllers\DocumentController::class, 'category_active']);
    Route::get('/doc_category/deactive/{id}', [App\Http\Controllers\DocumentController::class, 'category_deactive']);

    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
    Route::get('/category-form', [App\Http\Controllers\CategoryController::class, 'add'])->name('category-form');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category-store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
    Route::get('/category/active/{id}', [App\Http\Controllers\CategoryController::class, 'active']);
    Route::get('/category/deactive/{id}', [App\Http\Controllers\CategoryController::class, 'deactive']);

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product-form', [App\Http\Controllers\ProductController::class, 'add'])->name('product-form');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product-store');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
    Route::get('/product/active/{id}', [App\Http\Controllers\ProductController::class, 'active']);
    Route::get('/product/deactive/{id}', [App\Http\Controllers\ProductController::class, 'deactive']);
});
