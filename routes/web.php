<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
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

Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });
//BannerController
Route::resource('banner', App\Http\Controllers\BanerController::class);
// CountdownController
Route::resource('index', App\Http\Controllers\CountdownController::class);
// ClientFeedbackController
Route::resource('client', App\Http\Controllers\ClientController::class);


// Frontend Server
Route::get('/', [App\Http\Controllers\FrontendCpntroller::class, 'home'])->name('To_Honey');
Route::get('product/details/{product_id}', [App\Http\Controllers\FrontendCpntroller::class, 'product_details'])->name('product_details');
Route::get('contuct', [App\Http\Controllers\FrontendCpntroller::class, 'sabbir']);
// Route::get('product/view/{product_id}', [App\Http\Controllers\FrontendCpntroller::class, 'product_view'])->name('Product_view');
Route::get('product/wish_list/{product_id}', [App\Http\Controllers\FrontendCpntroller::class, 'product_wish_list'])->name('Product_wish_list');
Route::get('product/shop', [App\Http\Controllers\FrontendCpntroller::class, 'product_shop'])->name('Product_shop');
Route::get('category/shop/{category_id}', [App\Http\Controllers\FrontendCpntroller::class, 'category_shop'])->name('category_shop');
Route::post('update/posts', [App\Http\Controllers\FrontendCpntroller::class, 'update_posts'])->name('update_posts');
Route::get('customer/registration', [App\Http\Controllers\FrontendCpntroller::class, 'registration'])->name('registration');
Route::post('customer/registration/post', [App\Http\Controllers\FrontendCpntroller::class, 'registration_post'])->name('registration_post');
Route::get('customer/login', [App\Http\Controllers\FrontendCpntroller::class, 'customer_login'])->name('customer_login');
Route::post('customer/login/post', [App\Http\Controllers\FrontendCpntroller::class, 'coustomar_login_post'])->name('coustomar_login_post');
Route::get('customer/dashboard', [App\Http\Controllers\FrontendCpntroller::class, 'customer_dashboard'])->name('customer_dashboard');
Route::get('download/pdf/{pdf_id}', [App\Http\Controllers\FrontendCpntroller::class, 'download_pdf'])->name('download_pdf');
Route::post('get/city/list', [App\Http\Controllers\FrontendCpntroller::class, 'get_city_list']);
Route::post('place/order', [App\Http\Controllers\FrontendCpntroller::class, 'place_order']);
Route::get('about', [App\Http\Controllers\FrontendCpntroller::class, 'about_frontend'])->name('about');
// Route::get('/online/payment', [App\Http\Controllers\FrontendCpntroller::class, 'exampleHostedCheckout']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Category Server
Route::get('Categories', [App\Http\Controllers\CategoriesController::class, 'index']);
Route::post('categories/post', [App\Http\Controllers\CategoriesController::class, 'categoriespost'])->name('category_post');
Route::get('categories/delete/{category_id}', [App\Http\Controllers\CategoriesController::class, 'categoriesdelete']);
Route::get('categories/all/delete', [App\Http\Controllers\CategoriesController::class, 'categoriesalldelete']);
Route::get('categories/edit/{category_edit}', [App\Http\Controllers\CategoriesController::class, 'categoriesedit']);
Route::post('categories/posts/edit', [App\Http\Controllers\CategoriesController::class, 'categoriespostsedit']);
Route::get('Categories/resyclebin', [App\Http\Controllers\CategoriesController::class, 'recyclebin']);
Route::get('Categories/restore/{categories_name}', [App\Http\Controllers\CategoriesController::class, 'restore']);
Route::get('Categories/forcedelete/{categories_name}', [App\Http\Controllers\CategoriesController::class, 'forcedelete']);
Route::post('Categories/deleted/checekbox', [App\Http\Controllers\CategoriesController::class, 'deletecheckbox'])->name('deletecheckbox');
Route::post('Categories/checkbox', [App\Http\Controllers\CategoriesController::class, 'checkbox'])->name('checkdbox');

// Product Controller
Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::post('product/post', [App\Http\Controllers\ProductController::class, 'product_post'])->name('Product_post');
Route::get('product/edit/{product_id}', [App\Http\Controllers\ProductController::class, 'product_edit'])->name('edit');
Route::post('product/edit/post/{product_id}', [App\Http\Controllers\ProductController::class, 'product_post_edit'])->name('edit_post');
Route::get('product/delete/{product_id}', [App\Http\Controllers\ProductController::class, 'product_delete'])->name('delete');
Route::get('product/resyclebin', [App\Http\Controllers\ProductController::class, 'product_resyclebin'])->name('resyclebin');
Route::get('product/restore/{product_id}', [App\Http\Controllers\ProductController::class, 'product_restore'])->name('restore');
Route::get('product/forcedelete/{product_id}', [App\Http\Controllers\ProductController::class, 'product_forcedelete'])->name('forcedelete');
Route::post('product/all_restore/', [App\Http\Controllers\ProductController::class, 'product_all_restore'])->name('all_restore');
Route::get('product/contact', [App\Http\Controllers\ProductController::class, 'product_contact'])->name('product_contact');
Route::post('contuct/post', [App\Http\Controllers\ProductController::class, 'contuct_post']);


// Settings Controller
Route::get('settings', [App\Http\Controllers\SettingController::class, 'setting'])->name('setting');

// Adtocart Controller
Route::post('add/to/cart/{details_id}', [App\Http\Controllers\AddtocartController::class, 'addtocart'])->name('addtocart');
Route::get('cart/delete/{cart_id}', [App\Http\Controllers\AddtocartController::class, 'cartdelete'])->name('cartdelete');
Route::get('wishlist/delete/{wishlist_id}', [App\Http\Controllers\AddtocartController::class, 'wishlistdelete'])->name('wishlistdelete');
Route::get('cart', [App\Http\Controllers\AddtocartController::class, 'cart'])->name('cart');
Route::get('cart/{coupon_name}', [App\Http\Controllers\AddtocartController::class, 'cart'])->name('coupon_name');
Route::post('cart/update', [App\Http\Controllers\AddtocartController::class, 'cart_update'])->name('cart_update');
Route::get('checkout', [App\Http\Controllers\AddtocartController::class, 'checkout'])->name('checkout');

// Subcategory Controller
Route::get('subcategory', [App\Http\Controllers\SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('subcategories/post', [App\Http\Controllers\SubcategoryController::class, 'subcategory_post'])->name('subcategory_post');
Route::get('subcategories/edit/{ssubcategory_id}', [App\Http\Controllers\SubcategoryController::class, 'subcategory_edit'])->name('subcategory_edit');
Route::post('subcategories/update/{ssubcategory_id}', [App\Http\Controllers\SubcategoryController::class, 'subcategory_update'])->name('subcategory_update');
Route::get('subcategories/delete/{ssubcategory_id}', [App\Http\Controllers\SubcategoryController::class, 'subcategory_delete'])->name('subcategory_delete');

// CouponController
Route::resource('coupon', App\Http\Controllers\CouponController::class);




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
