<?php

use App\Http\Controllers\DynamicFormsStorageController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ResourceController;
use App\Http\Middleware\VerifyCsrfToken;
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

//Route::get('/', function () {
//    return redirect(route('admin.dashboard'));
//});

Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/login', [LoginController::class,'loginPage'])->name('loginPage');
Route::post('/logout', [LoginController::class,'logout'])->name('logout')->middleware('auth:sanctum');
Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::get('seniorCitizenDetail/{seniorCitizenDetail}/seniorCitizenQrcode', [FrontController::class,'seniorCitizenDetailQrcode'])->name('seniorCitizenDetail.qrcode');
Route::get('disabilityIdentityCard/{disabilityIdentityCard}/disabilityQrcode', [FrontController::class,'disabilityIdentityCardQrcode'])->name('disabilityIdentityCard.qrcode');
Route::get('introduction', [FrontController::class, 'introduction'])->name('introduction');
Route::get('category', [FrontController::class, 'category'])->name('category');
Route::get('contact', [FrontController::class, 'contact'])->name('contact');
Route::get('representative', [FrontController::class, 'representative'])->name('representative');
Route::get('audio', [FrontController::class, 'audio'])->name('audio');
Route::get('photo', [FrontController::class, 'photo'])->name('photo');
Route::get('single-photo', [FrontController::class, 'single_photo'])->name('single-photo');
Route::get('video', [FrontController::class, 'video'])->name('video');
Route::get('employee', [FrontController::class, 'employee'])->name('employee');
Route::get('about-us', [FrontController::class, 'aboutUs'])->name('about-us');
Route::get('organization', [FrontController::class, 'org'])->name('organization');
Route::get('executive', [FrontController::class, 'executive'])->name('executive');
Route::get('single-executive', [FrontController::class, 'single_executive'])->name('single-executive');
Route::get('service-details', [FrontController::class, 'service_details'])->name('service-details');

Route::get('/static/notice', [FrontController::class, 'notice'])->name('notice');
Route::get('/static/single-notice/{notice}', [FrontController::class, 'singleNotice'])->name('single-notice');

Route::prefix('print')->as('print.')->controller(PrintController::class)->group(function () {
    Route::post('applicationPrint', 'applicationPrint')->name('application-print');
    Route::post('officeLetterPrint', 'officeLetterPrint')->name('office-letter-print');
    Route::post('businessRegistrationPrint', 'businessRegistrationPrint')->name('business-registration-print');
});

Route::get('login/locked', [LoginController::class, 'locked'])->middleware('auth')->name('login.locked');
Route::post('login/locked', [LoginController::class, 'unlock'])->name('login.unlock');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::prefix('dynamic-forms')->name('dynamic-forms.')->group(function () {
    // Dummy route, we can use the route() helper to give formiojs the base path for this group
    Route::get('/')->name('index');

    Route::post('storage/s3', [DynamicFormsStorageController::class, 'storeS3'])
        ->withoutMiddleware([VerifyCsrfToken::class]);

    Route::get('storage/s3', [DynamicFormsStorageController::class, 'showS3'])->name('S3-file-download');
    Route::get('storage/s3/{fileKey}', [DynamicFormsStorageController::class, 'showS3'])->name('S3-file-redirect');

    Route::post('storage/url', [DynamicFormsStorageController::class, 'storeURL'])
        ->withoutMiddleware([VerifyCsrfToken::class]);

    Route::get('storage/url', [DynamicFormsStorageController::class, 'showURL'])->name('url-file-download');
    Route::delete('storage/url', [DynamicFormsStorageController::class, 'deleteURL']);

    Route::get('form', [ResourceController::class, 'index']);
    Route::get('form/{resource}', [ResourceController::class, 'resource']);
    Route::get('form/{resource}/submission', [ResourceController::class, 'resourceSubmissions']);
});
