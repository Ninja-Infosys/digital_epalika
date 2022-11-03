<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfficeHeaderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Setting\EthnicityController;
use App\Http\Controllers\Admin\Setting\FiscalYearController;
use App\Http\Controllers\Admin\Setting\OfficeSettingController;
use App\Http\Controllers\Admin\Setting\SettingDashboardController;
use App\Http\Controllers\Admin\Setting\Units\ExternalUnitConversionController;
use App\Http\Controllers\Admin\Setting\Units\InternalUnitConversionController;
use App\Http\Controllers\Admin\Setting\Units\MeasurementUnitController;
use App\Http\Controllers\Admin\Setting\Units\TypeController;
use App\Http\Controllers\Admin\Setting\Units\UnitController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\Website\ImportantLinkController;
use App\Http\Controllers\Admin\Website\MunicipalDetailController;
use App\Http\Controllers\Admin\Website\SliderController;
use App\Http\Controllers\Admin\Website\WebsiteDashboardController;
use App\Http\Controllers\TechController;
use Illuminate\Support\Facades\Route;
use Modules\ListRegistration\Http\Controllers\Admin\ListRegistrationController;

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::patch('profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::patch('password/update', [ProfileController::class, 'updatePassword'])->name('updatePassword');

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('tech-help', [TechController::class,'index'])->name('tech');
Route::view('lock-screen', 'admin.lock_screen.lock_screen')->name('lock-screen');
Route::view('terms', 'admin.terms_and_conditions.index')->name('terms');

//notification
Route::get('notification', [NotificationController::class, 'notification'])->name('notification');
Route::get('notification/{databaseNotification}', [NotificationController::class, 'readNotification'])->name('notification.read');
Route::get('readAllNotification', [NotificationController::class, 'readAllNotification'])->name('notification.readAllNotification');

//chunk file upload
Route::post('file-upload/chunkStore', [FileUploadController::class, 'chunkFileStore'])->name('fileUpload.chunkStore');

//Fiscal Year
Route::prefix('setting')->group(function () {
    Route::get('dashboard', SettingDashboardController::class)->name('setting.dashboard');
    Route::resource('ethnicity', EthnicityController::class);
    Route::resource('fiscalYear', FiscalYearController::class);

    Route::prefix('userManagement')->as('userManagement.')->group(function () {
        Route::resource('role', RoleController::class);
        Route::get('user/{user}/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
        Route::resource('user', UserController::class);
    });

    Route::prefix('units')->as('units.')->group(function () {
        Route::resource('type', TypeController::class);
        Route::resource('measurementUnit', MeasurementUnitController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('unit/{unit}/internalUnitConversion', InternalUnitConversionController::class)->names('unit.internal-unit-conversion');
        Route::resource('unit/{unit}/externalUnitConversion', ExternalUnitConversionController::class)->names('unit.external-unit-conversion');
    });
    Route::resource('officeSetting', OfficeSettingController::class);
    Route::resource('officeHeader', OfficeHeaderController::class)->only(['edit', 'update', 'destroy']);
});


//deleteFile
Route::resource('file', FileController::class)->only('destroy');

// website admin routes
Route::prefix('website')->as('website.')->middleware('can:websiteAdmin_access')->group(function () {
    Route::get('dashboard', WebsiteDashboardController::class)->name('dashboard');
    Route::resource('slider', SliderController::class);
    Route::resource('municipalDetail', MunicipalDetailController::class);
    Route::resource('importantLink', ImportantLinkController::class);
});

//activity logs
Route::get('activityLog', [ActivityLogController::class, 'index'])->name('activityLog.index');
