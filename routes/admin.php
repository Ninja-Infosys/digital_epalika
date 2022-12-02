<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExecutiveMeeting\MunicipalCommitteeController;
use App\Http\Controllers\Admin\ExecutiveMeeting\MunicipalMeetingDecisionController;
use App\Http\Controllers\Admin\ExecutiveMeeting\MunicipalMeetingNoticeController;
use App\Http\Controllers\Admin\ExecutiveMeeting\WardCommitteeController;
use App\Http\Controllers\Admin\ExecutiveMeeting\WardMeetingDecisionController;
use App\Http\Controllers\Admin\ExecutiveMeeting\WardMeetingNoticeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\ListRegistrationController;
use App\Http\Controllers\Admin\OfficeHeaderController;
use App\Http\Controllers\Admin\Setting\FiscalYearController;
use App\Http\Controllers\Admin\Setting\OfficeSettingController;
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
use Illuminate\Support\Facades\Route;


Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('userManagement')->as('userManagement.')->group(function () {
    Route::resource('role', RoleController::class);
    Route::get('user/{user}/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::resource('user', UserController::class);
});

//chunk file upload
Route::post('file-upload/chunkStore', [FileUploadController::class, 'chunkFileStore'])->name('fileUpload.chunkStore');

//setting
Route::prefix('setting')->group(function () {
    Route::resource('fiscalYear', FiscalYearController::class);

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


//executive meeting
Route::prefix('executiveMeeting')->as('executiveMeeting.')->group(function () {
    Route::resource('municipalCommittee', MunicipalCommitteeController::class);
    Route::resource('wardCommittee', WardCommitteeController::class);
    Route::get('municipalMeetingDetails', [MunicipalMeetingNoticeController::class, 'municipalMeetingDetails'])->name('municipalMeetingDetails');
    Route::get('municipalMeetingDetails/report', [MunicipalMeetingNoticeController::class, 'municipalMeetingDetailsReport'])->name('municipalMeetingDetailsReport');
    Route::resource('municipalMeetingNotice', MunicipalMeetingNoticeController::class);
    Route::resource('municipalMeetingDecision', MunicipalMeetingDecisionController::class);
    Route::get('wardMeetingDetails', [WardMeetingNoticeController::class, 'wardMeetingDetails'])->name('wardMeetingDetails');
    Route::get('wardMeetingDetails/report', [WardMeetingNoticeController::class, 'wardMeetingDetailsReport'])->name('wardMeetingDetailsReport');
    Route::resource('wardMeetingNotice', WardMeetingNoticeController::class);
    Route::resource('wardMeetingDecision', WardMeetingDecisionController::class);
});

Route::prefix('listRegistrations')->as('listRegistrations.')->group(function () {
    Route::resource('listRegistration', ListRegistrationController::class);
});


//deleteFile
Route::resource('file', FileController::class)->only('destroy');

// website admin routes
Route::prefix('website')->as('website.')->middleware('can:websiteAdmin_access')->group(function () {
    Route::resource('slider', SliderController::class);
    Route::resource('municipalDetail', MunicipalDetailController::class);
    Route::resource('importantLink', ImportantLinkController::class);
});

//activity logs
Route::get('activityLog', [ActivityLogController::class, 'index'])->name('activityLog.index');
