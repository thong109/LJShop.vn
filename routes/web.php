<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\RouteUri;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::resource('/', function () {
//     return view('layout');
// });
// Route::get('/trang-chu', function () {
//     return view('layout');
// });
//Frontend
Route::resource('trang-chu', HomeController::class);
Route::resource('/', HomeController::class);
//Search
Route::get('/timkiem', [HomeController::class, 'timkiem']);
Route::get('/tag/{product_tags}', [ProductController::class, 'tag']);
Route::post('/autocomplete-ajax', [HomeController::class, 'autocomplete_ajax']);

//Danh muc
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_slug}', [ProductController::class, 'details_product']);
Route::get('/chi-tiet-course/{course_id}', [CourseController::class, 'details_course']);
//Register
Route::get('/register', [RegisterController::class, 'register']);
Route::get('/activity', [HomeController::class, 'activity']);
Route::get('/sponsor', [HomeController::class, 'sponsor']);
Route::get('/course', [HomeController::class, 'course']);
//Mail
Route::get('/mail', [RegisterController::class, 'mail']);
//send mail
Route::get('/send-mail', [MailAdminController::class, 'send_mail']);
//
Route::post('/quickview', [ProductController::class, 'quickview']);
//Comment
Route::post('/load-comment', [ProductController::class, 'load_comment']);
Route::post('/send-comment', [ProductController::class, 'send_comment']);
Route::get('/list-comment', [ProductController::class, 'list_comment']);
Route::get('/delete-comment/{comment_id}', [ProductController::class, 'delete_comment']);
Route::post('/reply-comment', [ProductController::class, 'reply_comment']);
Route::post('/allow-comment', [ProductController::class, 'allow_comment']);
//Rating
Route::post('/insert-rating', [ProductController::class, 'insert_rating']);
// Route::get('/language/{language}', [LanguageController::class, 'language.dashboard']);
//Backend
Route::resource('/admin', AdminController::class);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::get('/thongke', [AdminController::class, 'thongke']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/language/{language}', [LanguageController::class, 'language']);
Route::post('/postcontact', [RegisterController::class, 'postcontact']);
//Category Product
Route::get('/add-category', [CategoryProduct::class, 'add_category']);
Route::get('/edit-category/{category_id}', [CategoryProduct::class, 'edit_category']);
Route::get('/delete-category/{category_id}', [CategoryProduct::class, 'delete_category']);
Route::get('/all-category', [CategoryProduct::class, 'all_category']);
Route::get('/unactive-category/{category_id}', [CategoryProduct::class, 'unactive_category']);
Route::get('/active-category/{category_id}', [CategoryProduct::class, 'active_category']);
Route::post('/save-category', [CategoryProduct::class, 'save_category']);
Route::post('/update-category/{category_id}', [CategoryProduct::class, 'update_category']);
Route::get('/product-by-category/{category_id}', [HomeController::class, 'product_by_category']);
//Export
Route::post('/export-csv', [CategoryProduct::class, 'export_csv']);
Route::post('/export-product', [ProductController::class, 'export_product']);
//Import
Route::post('/import-csv', [CategoryProduct::class, 'import_csv']);
Route::post('/import-product', [ProductController::class, 'import_product']);
Route::post('/import-word', [ProductController::class, 'import_word']);
//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
// Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
// Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-sp/{session_id}', [CartController::class, 'delete_sp']);
Route::get('/delete-all-cart', [CartController::class, 'delete_all_cart']);
//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/del-cou', [CartController::class, 'del_cou']);
Route::get('/unactive-coupon/{coupon_id}', [CouponController::class, 'unactive_coupon']);
Route::get('/active-coupon/{coupon_id}', [CouponController::class, 'active_coupon']);
//Delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);
//post
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/caculate-fee', [CheckoutController::class, 'caculate_fee']);
Route::get('/del-fee', [CheckoutController::class, 'del_fee']);
//Coupon Admin
Route::get('/coupon', [CouponController::class, 'insert_coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::post('/save-coupon', [CouponController::class, 'save_coupon']);
Route::get('/del-coupon/{coupon_id}', [CouponController::class, 'del_coupon']);
//Checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout', [CheckoutController::class, 'save_checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);
//Order
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/update-order-qty', [OrderController::class, 'update_order_qty']);
//Order Admin
Route::get('/manager-order', [OrderController::class, 'manager_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
Route::get('/delete-order/{order_code}', [OrderController::class, 'delete_order']);
//Print_Order
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);

//Banner
Route::get('/add-banner', [BannerController::class, 'add_banner']);
Route::get('/edit-banner/{banner_id}', [BannerController::class, 'edit_banner']);
Route::get('/delete-banner/{banner_id}', [BannerController::class, 'delete_banner']);
Route::get('/all-banner', [BannerController::class, 'all_banner']);
Route::get('/unactive-banner/{banner_id}', [BannerController::class, 'unactive_banner']);
Route::get('/active-banner/{banner_id}', [BannerController::class, 'active_banner']);
Route::post('/save-banner', [BannerController::class, 'save_banner']);
Route::post('/update-banner/{banner_id}', [BannerController::class, 'update_banner']);
//Slider
Route::get('/add-slider', [SliderController::class, 'add_slider']);
Route::get('/edit-slider/{slider_id}', [SliderController::class, 'edit_slider']);
Route::get('/delete-slider/{slider_id}', [SliderController::class, 'delete_slider']);
Route::get('/all-slider', [SliderController::class, 'all_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']);
Route::post('/save-slider', [SliderController::class, 'save_slider']);
Route::post('/update-slider/{slider_id}', [SliderController::class, 'update_slider']);
//Sponsor
Route::get('/add-sponsor', [SponsorController::class, 'add_sponsor']);
Route::get('/edit-sponsor/{sponsor_id}', [SponsorController::class, 'edit_sponsor']);
Route::get('/delete-sponsor/{sponsor_id}', [SponsorController::class, 'delete_sponsor']);
Route::get('/all-sponsor', [SponsorController::class, 'all_sponsor']);
Route::get('/unactive-sponsor/{sponsor_id}', [SponsorController::class, 'unactive_sponsor']);
Route::get('/active-sponsor/{sponsor_id}', [SponsorController::class, 'active_sponsor']);
Route::post('/save-sponsor', [SponsorController::class, 'save_sponsor']);
Route::post('/update-sponsor/{sponsor_id}', [SponsorController::class, 'update_sponsor']);
//Course
Route::get('/add-course', [CourseController::class, 'add_course']);
Route::get('/edit-course/{course_id}', [CourseController::class, 'edit_course']);
Route::get('/delete-course/{course_id}', [CourseController::class, 'delete_course']);
Route::get('/all-course', [CourseController::class, 'all_course']);
Route::get('/unactive-course/{course_id}', [CourseController::class, 'unactive_course']);
Route::get('/active-course/{course_id}', [CourseController::class, 'active_course']);
Route::post('/save-course', [CourseController::class, 'save_course']);
Route::post('/update-course/{course_id}', [CourseController::class, 'update_course']);
//Activity
Route::get('/add-activity', [ActivityController::class, 'add_activity']);
Route::get('/edit-activity/{activity_id}', [ActivityController::class, 'edit_activity']);
Route::get('/delete-activity/{activity_id}', [ActivityController::class, 'delete_activity']);
Route::get('/all-activity', [ActivityController::class, 'all_activity']);
Route::get('/unactive-activity/{activity_id}', [ActivityController::class, 'unactive_activity']);
Route::get('/active-activity/{activity_id}', [ActivityController::class, 'active_activity']);
Route::post('/save-activity', [ActivityController::class, 'save_activity']);
Route::post('/update-activity/{activity_id}', [ActivityController::class, 'update_activity']);
//introduce
//Login facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);
//add gallery
Route::get('/add-gallery/{product_id}', [GalleryController::class, 'add_gallery']);
Route::post('/select-gallery', [GalleryController::class, 'select_gallery']);
Route::post('/insert-gallery/{pro_id}', [GalleryController::class, 'insert_gallery']);
Route::post('/update-gallery', [GalleryController::class, 'update_gallery']);
Route::post('/delete-gallery', [GalleryController::class, 'delete_gallery']);
Route::post('/update-gallery-image', [GalleryController::class, 'update_gallery_image']);
//THong ke
Route::post('/filter-by-date', [AdminController::class, 'filter_by_date']);
Route::post('/day-orders', [AdminController::class, 'day_orders']);
Route::post('/dashboard-filter', [AdminController::class, 'dashboard_filter']);

//APi Doccument gg drive
Route::get('/upload_file', [DocumentController::class, 'upload_file']);
Route::get('/upload_image', [DocumentController::class, 'upload_image']);
Route::get('/upload_video', [DocumentController::class, 'upload_video']);

Route::get('/download_document', [DocumentController::class, 'download_document']);
Route::get('/creat_document', [DocumentController::class, 'creat_document']);
Route::get('/list_document', [DocumentController::class, 'list_document']);
Route::get('/read_document', [DocumentController::class, 'read_document']);
Route::get('/delete_document', [DocumentController::class, 'delete_document']);
//Folder
Route::get('/creat_folder', [DocumentController::class, 'creat_folder']);
Route::get('/rename_folder', [DocumentController::class, 'rename_folder']);
Route::get('/delete_folder', [DocumentController::class, 'delete_folder']);
//Send Mail
Route::get('/send-coupon', [MailAdminController::class, 'send_coupon']);
Route::get('/mail-example', [MailAdminController::class, 'mail_example']);
Route::get('/send-mail', [MailAdminController::class, 'send_mail']);
Route::get('/customer-list', [MailAdminController::class, 'all_customer']);
Route::get('/unactive-cus/{customer_id}', [MailAdminController::class, 'unactive_cus']);
Route::get('/active-cus/{customer_id}', [MailAdminController::class, 'active_cus']);
