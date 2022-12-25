<?php

use App\Http\Controllers\MainController;
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

// Front & User Interface Routes
Route::get('/', [App\Http\Controllers\front\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\front\PageController::class, 'aboutus']);
Route::get('/contact-us', [App\Http\Controllers\front\PageController::class, 'contact']);
Route::get('/faq', [App\Http\Controllers\front\FaqController::class, 'index']);
Route::get('/blog', [App\Http\Controllers\front\BlogController::class, 'index']);
Route::post('/blog/search', [App\Http\Controllers\front\BlogController::class, 'search']);
Route::get('/blog/detail/{id}', [App\Http\Controllers\front\BlogController::class, 'detail']);
Route::get('/news', [App\Http\Controllers\front\BlogController::class, 'news']);
Route::get('/careers', [App\Http\Controllers\front\CareerController::class, 'index']);
Route::get('/news/detail/{id}', [App\Http\Controllers\front\BlogController::class, 'newsDetail']);
Route::get('/product/list/{category_id}', [App\Http\Controllers\front\ProductController::class, 'index']);
Route::post('/product/search/{category_id}', [App\Http\Controllers\front\ProductController::class, 'search']);
Route::get('/product/detail/{name}/{product_id}', [App\Http\Controllers\front\ProductController::class, 'singleProduct']);
Route::post('/subscribe/newsletter', [App\Http\Controllers\front\HomeController::class, 'subscribe']);
Route::get('/nosubscribe/newsletter', [App\Http\Controllers\front\HomeController::class, 'noSubscribe']);
Route::get('/distributor/{id}/profile', [App\Http\Controllers\front\HomeController::class, 'distributor_profile']);

Route::post('/enquiry/distributor', [App\Http\Controllers\front\ProductController::class, 'enquiry']);
Route::get('/open/document/{name}/{attachment}', [App\Http\Controllers\front\ProductController::class, 'openDoc']);
Route::post('/enquiry/product', [App\Http\Controllers\front\ProductController::class, 'productEnquiry']);
Route::get('/map/locations', [App\Http\Controllers\front\HomeController::class, 'getLocations']);
Route::get('/map/country/locations', [App\Http\Controllers\front\HomeController::class, 'getCountryLocations']);
Route::post('/post/contact', [App\Http\Controllers\front\HomeController::class, 'postContact']);

// User login/registration
Route::get('/user/register', [App\Http\Controllers\front\HomeController::class, 'register']);
Route::post('/user/register', [App\Http\Controllers\front\HomeController::class, 'postRegister']);
Route::post('/user/login', [App\Http\Controllers\front\HomeController::class, 'postLogin']);

// Distributor login/registration
Route::get('/distributor/register', [App\Http\Controllers\front\HomeController::class, 'distRegister']);
Route::post('/distributor/register', [App\Http\Controllers\front\HomeController::class, 'postDistRegister']);
Route::post('/distributor/login', [App\Http\Controllers\front\HomeController::class, 'postDistLogin']);
Route::get('/distributor/logout', [App\Http\Controllers\front\HomeController::class, 'distLogout']);

// Thanks
Route::get('/page/thanks', [App\Http\Controllers\front\HomeController::class, 'thanks']);

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

    Route::get('/user/profile', [App\Http\Controllers\DashboardController::class, 'profile']);
    Route::get('/user/inbox', [App\Http\Controllers\DashboardController::class, 'inbox']);
    Route::get('/user/setting', [App\Http\Controllers\DashboardController::class, 'setting']);

    Route::get('/documents', [App\Http\Controllers\DocumentController::class, 'index']);
    Route::get('/document-form', [App\Http\Controllers\DocumentController::class, 'doc_add']);
    Route::post('/document/store', [App\Http\Controllers\DocumentController::class, 'doc_store']);
    Route::get('/document/edit/{id}', [App\Http\Controllers\DocumentController::class, 'doc_edit']);
    Route::get('/document/delete/{id}', [App\Http\Controllers\DocumentController::class, 'doc_delete']);
    Route::get('/document/active/{id}', [App\Http\Controllers\DocumentController::class, 'doc_active']);
    Route::get('/document/deactive/{id}', [App\Http\Controllers\DocumentController::class, 'doc_deactive']);

    Route::get('/document/users', [App\Http\Controllers\DocumentController::class, 'docUsers']);
    //Route::get('/doc_user-form', [App\Http\Controllers\DocumentController::class, 'docuser_add']);
    //Route::post('/doc_user/store', [App\Http\Controllers\DocumentController::class, 'docuser_store']);
    //Route::get('/doc_user/edit/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_edit']);
    Route::get('/doc_user/delete/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_delete']);
    Route::get('/doc_user/active/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_active']);
    Route::get('/doc_user/deactive/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_deactive']);
    Route::get('/doc_user/approve/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_approve']);
    Route::get('/doc_user/reject/{id}', [App\Http\Controllers\DocumentController::class, 'docuser_reject']);

    Route::get('/distributors', [App\Http\Controllers\DistributerController::class, 'index']);
    Route::get('/distributor-form', [App\Http\Controllers\DistributerController::class, 'add']);
    Route::post('/distributor/store', [App\Http\Controllers\DistributerController::class, 'store']);
    Route::get('/distributor/edit/{id}', [App\Http\Controllers\DistributerController::class, 'edit']);
    Route::get('/distributor/delete/{id}', [App\Http\Controllers\DistributerController::class, 'delete']);
    Route::get('/distributor/active/{id}', [App\Http\Controllers\DistributerController::class, 'active']);
    Route::get('/distributor/deactive/{id}', [App\Http\Controllers\DistributerController::class, 'deactive']);
    Route::get('/distributor/approve/{id}', [App\Http\Controllers\DistributerController::class, 'approve']);
    Route::get('/distributor/reject/{id}', [App\Http\Controllers\DistributerController::class, 'reject']);

    Route::get('/document/categories', [App\Http\Controllers\DocumentController::class, 'docCategories']);
    Route::get('/doc_category-form', [App\Http\Controllers\DocumentController::class, 'category_add']);
    Route::post('/getDocSubCategory', [App\Http\Controllers\DocumentController::class, 'getDocSubCategory']);
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

    Route::get('/fcategories', [App\Http\Controllers\FaqController::class, 'categories']);
    Route::get('/fcategory-form', [App\Http\Controllers\FaqController::class, 'category_add']);
    Route::post('/fcategory/store', [App\Http\Controllers\FaqController::class, 'category_store']);
    Route::get('/fcategory/edit/{id}', [App\Http\Controllers\FaqController::class, 'category_edit']);
    Route::get('/fcategory/delete/{id}', [App\Http\Controllers\FaqController::class, 'category_delete']);
    Route::get('/fcategory/active/{id}', [App\Http\Controllers\FaqController::class, 'category_active']);
    Route::get('/fcategory/deactive/{id}', [App\Http\Controllers\FaqController::class, 'category_deactive']);

    Route::get('/faqs', [App\Http\Controllers\FaqController::class, 'index']);
    Route::get('/faq-form', [App\Http\Controllers\FaqController::class, 'add']);
    Route::post('/faq/store', [App\Http\Controllers\FaqController::class, 'store']);
    Route::get('/faq/edit/{id}', [App\Http\Controllers\FaqController::class, 'edit']);
    Route::get('/faq/delete/{id}', [App\Http\Controllers\FaqController::class, 'delete']);
    Route::get('/faq/active/{id}', [App\Http\Controllers\FaqController::class, 'active']);
    Route::get('/faq/deactive/{id}', [App\Http\Controllers\FaqController::class, 'deactive']);

    Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index']);
    Route::get('/blog-form', [App\Http\Controllers\BlogController::class, 'add']);
    Route::post('/blog/store', [App\Http\Controllers\BlogController::class, 'store']);
    Route::get('/blog/edit/{id}', [App\Http\Controllers\BlogController::class, 'edit']);
    Route::get('/blog/delete/{id}/{type}', [App\Http\Controllers\BlogController::class, 'delete']);
    Route::get('/blog/active/{id}/{type}', [App\Http\Controllers\BlogController::class, 'active']);
    Route::get('/blog/deactive/{id}/{type}', [App\Http\Controllers\BlogController::class, 'deactive']);

    Route::get('/news', [App\Http\Controllers\BlogController::class, 'news_list']);
    Route::get('/news-form', [App\Http\Controllers\BlogController::class, 'news_add']);
    Route::post('/news/store', [App\Http\Controllers\BlogController::class, 'news_store']);
    Route::get('/news/edit/{id}', [App\Http\Controllers\BlogController::class, 'news_edit']);
    Route::get('/news/delete/{id}/{type}', [App\Http\Controllers\BlogController::class, 'delete']);
    Route::get('/news/active/{id}/{type}', [App\Http\Controllers\BlogController::class, 'active']);
    Route::get('/news/deactive/{id}/{type}', [App\Http\Controllers\BlogController::class, 'deactive']);

    Route::get('/contents', [App\Http\Controllers\ContentController::class, 'index']);
    Route::get('/content-form', [App\Http\Controllers\ContentController::class, 'add']);
    Route::post('/content/store', [App\Http\Controllers\ContentController::class, 'store']);
    Route::get('/content/edit/{id}', [App\Http\Controllers\ContentController::class, 'edit']);
    Route::get('/content/delete/{id}', [App\Http\Controllers\ContentController::class, 'delete']);
    Route::get('/content/active/{id}', [App\Http\Controllers\ContentController::class, 'active']);
    Route::get('/content/deactive/{id}', [App\Http\Controllers\ContentController::class, 'deactive']);

    Route::get('/sliders', [App\Http\Controllers\SliderController::class, 'index']);
    Route::get('/slider-form', [App\Http\Controllers\SliderController::class, 'add']);
    Route::post('/slider/store', [App\Http\Controllers\SliderController::class, 'store']);
    Route::get('/slider/edit/{id}', [App\Http\Controllers\SliderController::class, 'edit']);
    Route::get('/slider/delete/{id}', [App\Http\Controllers\SliderController::class, 'delete']);
    Route::get('/slider/active/{id}', [App\Http\Controllers\SliderController::class, 'active']);
    Route::get('/slider/deactive/{id}', [App\Http\Controllers\SliderController::class, 'deactive']);

    Route::get('/benefits', [App\Http\Controllers\BenefitController::class, 'index']);
    Route::get('/benefit-form', [App\Http\Controllers\BenefitController::class, 'add']);
    Route::post('/benefit/store', [App\Http\Controllers\BenefitController::class, 'store']);
    Route::get('/benefit/edit/{id}', [App\Http\Controllers\BenefitController::class, 'edit']);
    Route::get('/benefit/delete/{id}', [App\Http\Controllers\BenefitController::class, 'delete']);
    Route::get('/benefit/active/{id}', [App\Http\Controllers\BenefitController::class, 'active']);
    Route::get('/benefit/deactive/{id}', [App\Http\Controllers\BenefitController::class, 'deactive']);

    Route::get('/addresses', [App\Http\Controllers\AddressController::class, 'index']);
    Route::get('/address-form', [App\Http\Controllers\AddressController::class, 'add']);
    Route::post('/address/store', [App\Http\Controllers\AddressController::class, 'store']);
    Route::get('/address/edit/{id}', [App\Http\Controllers\AddressController::class, 'edit']);
    Route::get('/address/delete/{id}', [App\Http\Controllers\AddressController::class, 'delete']);
    Route::get('/address/active/{id}', [App\Http\Controllers\AddressController::class, 'active']);
    Route::get('/address/deactive/{id}', [App\Http\Controllers\AddressController::class, 'deactive']);

    Route::get('/meetus', [App\Http\Controllers\AddressController::class, 'meetus_list']);
    Route::get('/meetus-form', [App\Http\Controllers\AddressController::class, 'meetus_add']);
    Route::post('/meetus/store', [App\Http\Controllers\AddressController::class, 'meetus_store']);
    Route::get('/meetus/edit/{id}', [App\Http\Controllers\AddressController::class, 'meetus_edit']);
    Route::get('/meetus/delete/{id}', [App\Http\Controllers\AddressController::class, 'meetus_delete']);
    Route::get('/meetus/active/{id}', [App\Http\Controllers\AddressController::class, 'meetus_active']);
    Route::get('/meetus/deactive/{id}', [App\Http\Controllers\AddressController::class, 'meetus_deactive']);

    Route::get('/careers', [App\Http\Controllers\CareerController::class, 'index']);
    Route::get('/career-form', [App\Http\Controllers\CareerController::class, 'add']);
    Route::post('/career/store', [App\Http\Controllers\CareerController::class, 'store']);
    Route::get('/career/edit/{id}', [App\Http\Controllers\CareerController::class, 'edit']);
    Route::get('/career/delete/{id}', [App\Http\Controllers\CareerController::class, 'delete']);
    Route::get('/career/active/{id}', [App\Http\Controllers\CareerController::class, 'active']);
    Route::get('/career/deactive/{id}', [App\Http\Controllers\CareerController::class, 'deactive']);

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product-form', [App\Http\Controllers\ProductController::class, 'add'])->name('product-form');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product-store');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
    Route::get('/product/active/{id}', [App\Http\Controllers\ProductController::class, 'active']);
    Route::get('/product/deactive/{id}', [App\Http\Controllers\ProductController::class, 'deactive']);
});
