<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfficeHeaderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Setting\BranchController;
use App\Http\Controllers\Admin\Setting\DepartmentController;
use App\Http\Controllers\Admin\Setting\DesignationController;
use App\Http\Controllers\Admin\Setting\EmergencyCategoryController;
use App\Http\Controllers\Admin\Setting\EmergencyNumberController;
use App\Http\Controllers\Admin\Setting\EmployeeController;
use App\Http\Controllers\Admin\Setting\EthnicityController;
use App\Http\Controllers\Admin\Setting\ExperienceController;
use App\Http\Controllers\Admin\Setting\ExperienceFileController;
use App\Http\Controllers\Admin\Setting\FeatureActivationController;
use App\Http\Controllers\Admin\Setting\FiscalYearController;
use App\Http\Controllers\Admin\Setting\MailSettingController;
use App\Http\Controllers\Admin\Setting\OccupationController;
use App\Http\Controllers\Admin\Setting\OfficeSettingController;
use App\Http\Controllers\Admin\Setting\QualificationController;
use App\Http\Controllers\Admin\Setting\RelationshipController;
use App\Http\Controllers\Admin\Setting\SettingDashboardController;
use App\Http\Controllers\Admin\Setting\SmsSettingController;
use App\Http\Controllers\Admin\Setting\Units\ExternalUnitConversionController;
use App\Http\Controllers\Admin\Setting\Units\InternalUnitConversionController;
use App\Http\Controllers\Admin\Setting\Units\MeasurementUnitController;
use App\Http\Controllers\Admin\Setting\Units\TypeController;
use App\Http\Controllers\Admin\Setting\Units\UnitController;
use App\Http\Controllers\Admin\Settings\LetterHeadController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\Website\ImportantLinkController;
use App\Http\Controllers\Admin\Website\MunicipalDetailController;
use App\Http\Controllers\Admin\Website\SliderController;
use App\Http\Controllers\Admin\Website\WebsiteDashboardController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\TechController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
Route::patch('profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::patch('password/update', [ProfileController::class, 'updatePassword'])->name('updatePassword');

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::controller(AddressController::class)->prefix('address')->as('address.')->group(function () {
    Route::get('districts', 'district')->name('districts');
    Route::get('local-bodies', 'localBodies')->name('local-bodies');
    Route::get('ward-no', 'wardNo')->name('ward-no');
});
Route::get('cache-clear', [DashboardController::class, 'cacheClear'])->name('cache-clear');
Route::get('tech-help', [TechController::class, 'index'])->name('tech');
Route::view('lock-screen', 'admin.lock_screen.lock_screen')->name('lock-screen');
Route::view('terms', 'admin.terms_and_conditions.index')->name('terms');
Route::get('fileView', [FileController::class, 'index'])->name('fileView');

//notification
Route::get('notification', [NotificationController::class, 'notification'])->name('notification');
Route::get('notification/{databaseNotification}', [NotificationController::class, 'readNotification'])->name('notification.read');
Route::get('readAllNotification', [NotificationController::class, 'readAllNotification'])->name('notification.readAllNotification');

//chunk file upload
Route::post('file-upload/chunkStore', [FileUploadController::class, 'chunkFileStore'])->name('fileUpload.chunkStore');



//file
Route::get('file/{file}/download', [FileController::class, 'download'])->name('file.download');
Route::get('file-download', [FileController::class, 'downloadFile'])->name('file-url-download');
Route::post('file-upload', [FileController::class, 'fileUpload'])->name('file-upload');
Route::get('file-manager', [FileController::class, 'getFileManager'])->name('file.get-file-manager');
Route::resource('file', FileController::class)->only('show', 'index', 'store', 'destroy');

// website admin routes
Route::prefix('website')->as('website.')->group(function () {
    Route::get('dashboard', WebsiteDashboardController::class)->name('dashboard');
    Route::resource('slider', SliderController::class)->except('show');
    Route::resource('municipalDetail', MunicipalDetailController::class);
    Route::resource('importantLink', ImportantLinkController::class);
});

//activity logs
Route::get('activityLog', [ActivityLogController::class, 'index'])->name('activityLog.index');

//check pin
Route::post('pin/checkPin', [PinController::class, 'checkPin'])->name('pin.check-pin');
Route::resource('pin', PinController::class);
