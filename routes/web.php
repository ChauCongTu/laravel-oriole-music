<?php

use App\Http\Controllers\Admin\BannerManagementController;
use App\Http\Controllers\Admin\BrandManangementController;
use App\Http\Controllers\Admin\CatalogueManangementController;
use App\Http\Controllers\Admin\CategoriesManagementController;
use App\Http\Controllers\Admin\CourseManagementController;
use App\Http\Controllers\Admin\DesignManangementController;
use App\Http\Controllers\Admin\ReviewManagementController;
use App\Http\Controllers\Admin\InstrumentManagementController;
use App\Http\Controllers\Admin\PostManagementController;
use App\Http\Controllers\Admin\ServiceManagementController;
use App\Http\Controllers\Admin\SheetsManagementController;
use App\Http\Controllers\Admin\TeacherManagementController;
use App\Http\Controllers\Admin\TypeManangementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeacherController;
use App\Models\Brand;
use App\Models\Catalogue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

// Bật bảo trì bằng cách comment đoạn code dưới đây

// Route::get('/{path?}', function() {
//     return Hash::make('123456');
// })->where(['path' => '.+']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search');
Route::post('/sendContact', [HomeController::class, 'sendContact'])->name('sendContact');
Route::get('/thanh-toan/{type}/{id}', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/link', function() {
   $targetFolder = storage_path('app/public');
   $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage';
   symlink($targetFolder, $linkFolder);
});

Route::middleware('auth.guest')->get('/josh-cqn-login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth.guest')->post('/josh-cqn-login', [AuthController::class, 'handleLogin'])->name('login');

// Post route
Route::get('/{slug}.{id}', [PostController::class, 'show'])->where([
    'slug' => '.+',
    'id' => '[0-9]+'
])->name('post.show');
Route::post('/gui-binh-luan/{reply_id?}', [PostController::class, 'submitComment'])->name('post.comment');
Route::middleware('auth.login')->delete('/xoa-binh-luan/{id}', [PostController::class, 'deleteComment'])->name('post.comment.delete');

// Categoty route
Route::get('/danh-muc/{id}/{slug}', [CategoriesController::class, 'show'])->name('category.show');
Route::get('/danh-muc/{slug}', [CategoriesController::class, 'index'])->name('category.index');

// Course route
Route::get('/khoa-hoc/{id}/{slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/khoa-hoc', [CourseController::class, 'index'])->name('course.index');

// Service route
Route::get('/dich-vu/{id}/{slug}', [ServiceController::class, 'show'])->name('service.show');
Route::get('/dich-vu', [ServiceController::class, 'index'])->name('service.index');

// Instrument route
Route::get('/san-pham/{id}/{slug}', [InstrumentController::class, 'show'])->name('instrument.show');
Route::get('/san-pham', [InstrumentController::class, 'seeAll'])->name('instrument.all');

// Sheet route
Route::get('/sheet-nhac/{id}/{slug}', [SheetController::class, 'show'])->name('sheet.show');
Route::get('/sheet-nhac', [SheetController::class, 'index'])->name('sheet.index');

// Teacher route
Route::get('/thong-tin-giang-vien/{name?}', [TeacherController::class, 'show'])->name('giang-vien.show');

// Admin route
Route::prefix('admin')->middleware('auth.login')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/destroyContact/{id}', [AdminController::class, 'destroyContact'])->name('admin.contact.destroy');
    Route::put('/handleContact/{id}', [AdminController::class, 'handleContact'])->name('admin.contact.handled');
    Route::resource('/quan-ly-banner', BannerManagementController::class);
    Route::resource('/quan-ly-danh-muc', CategoriesManagementController::class);
    Route::resource('/quan-ly-bai-viet', PostManagementController::class);
    Route::resource('/quan-ly-loai-dan', TypeManangementController::class);
    Route::resource('/quan-ly-thuong-hieu', BrandManangementController::class);
    Route::resource('/quan-ly-loai-san-pham', CatalogueManangementController::class);
    Route::resource('/quan-ly-kieu-dan', DesignManangementController::class);
    Route::resource('/quan-ly-giang-vien', TeacherManagementController::class);
    Route::resource('/quan-ly-khoa-hoc', CourseManagementController::class);
    Route::put('/changeDiscount/{id}/khoa-hoc', [CourseManagementController::class, 'changeDiscount'])->name('quan-ly-khoa-hoc.changeDiscount');
    Route::resource('/quan-ly-dich-vu', ServiceManagementController::class);
    Route::put('/changeDiscount/{id}/dich-vu', [ServiceManagementController::class, 'changeDiscount'])->name('quan-ly-dich-vu.changeDiscount');
    Route::resource('/quan-ly-sheet-nhac', SheetsManagementController::class);
    Route::put('/changeDiscount/{id}/sheet', [SheetsManagementController::class, 'changeDiscount'])->name('quan-ly-sheet-nhac.changeDiscount');
    Route::resource('/quan-ly-san-pham', InstrumentManagementController::class);
    Route::put('/changeDiscount/{id}/san-pham', [InstrumentManagementController::class, 'changeDiscount'])->name('quan-ly-san-pham.changeDiscount');
    Route::delete('/san-pham/xoa/{id}', [InstrumentManagementController::class, 'deleteImage'])->name('quan-ly-san-pham.deleteImage');
    Route::get('/hinh-anh-san-pham-{id}', [InstrumentManagementController::class, 'imagesSP'])->name('quan-ly-san-pham.imagesSP');
    Route::post('/hinh-anh-san-pham-{id}', [InstrumentManagementController::class, 'addImagesSP'])->name('quan-ly-san-pham.imagesSP');
    Route::resource('/quan-ly-nguoi-dung', UserManagementController::class);
    Route::put('/banAccount/{id}', [UserManagementController::class, 'banAccount'])->name('quan-ly-nguoi-dung.banAccount');
    Route::resource('/quan-ly-danh-gia', ReviewManagementController::class);
    Route::put('/password/{id}/reset', [UserManagementController::class, 'resetPassword'])->name('quan-ly-nguoi-dung.resetPassword');
    Route::put('/setRole/{id}', [UserManagementController::class, 'setRole'])->name('quan-ly-nguoi-dung.setRole');
    Route::get('/doi-mat-khau', [UserManagementController::class, 'viewChangePassword'])->name('quan-ly-nguoi-dung.changePassword');
    Route::put('/doi-mat-khau', [UserManagementController::class, 'changePassword'])->name('quan-ly-nguoi-dung.changePassword');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');
});
