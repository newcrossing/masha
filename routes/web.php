<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CKEditorController;


use App\Http\Controllers\ProfileController;
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
Route::get('qr1', function ()
{
    return QRCode::text('QR Code Generator for !')->png();
});

Route::get('/', [HomeController::class, 'index'])->name('home');;
Route::get('/agreement', [AgreementController::class, 'index'])->name('agreement');;
Route::get('/contact', [AgreementController::class, 'contact'])->name('contact');;
Route::get('/help', [AgreementController::class, 'help'])->name('help');;
Route::get('/privacy-policy', [AgreementController::class, 'privacy'])->name('privacy-policy');
Route::get('/public-offer', [AgreementController::class, 'public_offer'])->name('public-offer');
Route::get('/security', [AgreementController::class, 'security'])->name('security');
Route::get('/board/{id}', [BoardController::class, 'single'])->where('id', '[0-9]+')->name('board.single');
Route::get('/{slug}', [BoardController::class, 'qr'])->where('slug', 'qr-[A-Za-z0-9]+')->name('qr');
Route::post('/sendmail', [BoardController::class, 'sendmail'])->name('board.send');
Route::post('/sendorder', [BoardController::class, 'sendorder'])->name('board.sendorder');

Route::get('forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [UserController::class, 'forgotPasswordValidate']);
Route::post('forgot-password', [UserController::class, 'resetPassword'])->name('forgot-password');

Route::put('reset-password', [UserController::class, 'updatePassword'])->name('reset-password');


Route::middleware(['role:admin|user'])->group(
    function () {
        Route::get('/foto/delete/{id}', [FotoController::class, 'destroy'])->name('foto.delete');

        Route::get('/board', [BoardController::class, 'list'])->name('board.list');
        Route::get('/board/edit/', [BoardController::class, 'edit'])->name('board.edit');
        Route::post('/board/update/{id}', [BoardController::class, 'update'])->name('board.update');
        Route::post('/board/insert', [BoardController::class, 'insert'])->name('board.insert');
        Route::get('/board/create', [BoardController::class, 'create'])->name('board.create');

        Route::post('/profile/settings', [ProfileController::class, 'update']);
        Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    }
);

Route::middleware(['role:admin'])->prefix('admin')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\Adm\HomeController::class, 'index'])->name('admin.home');
        Route::get('/log', [\App\Http\Controllers\Adm\LogController::class, 'list'])->name('admin.log.list');
        // Route::resource('post', App\Http\Controllers\Adm\PostController::class);
        Route::resource('doc', App\Http\Controllers\Adm\DocController::class);
        Route::resource('content', App\Http\Controllers\Adm\ContentController::class);
        Route::resource('user', App\Http\Controllers\Adm\UserController::class);
        Route::get('create_many', [\App\Http\Controllers\Adm\UserController::class, 'create_many'])->name('admin.user.create_many');
        Route::post('create_many', [\App\Http\Controllers\Adm\UserController::class, 'create_many_do']);


        Route::resource('slider', App\Http\Controllers\Adm\SliderController::class);
        Route::resource('social', App\Http\Controllers\Adm\SocialController::class);
        Route::resource('point', App\Http\Controllers\Adm\PointController::class);
        Route::resource('step', App\Http\Controllers\Adm\StepController::class);
        Route::post('/ajax-slider-del', [App\Http\Controllers\Adm\SliderController::class, 'delete'])->name('ajax-slider-del');
    }
);


Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Auth::routes(
    [
        'login' => true,
        'logout' => true,
        'register' => true,
        'reset' => true,   // for resetting passwords
        'confirm' => false,  // for additional password confirmations
        'verify' => false,  // for email verification
    ]
);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


