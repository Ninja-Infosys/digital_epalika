<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExecutiveMeeting\MunicipalCommitteeController;
use App\Http\Controllers\Admin\ExecutiveMeeting\WardCommitteeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\ListRegistrationController;
use App\Http\Controllers\Admin\Setting\FiscalYearController;
use App\Http\Controllers\Admin\Setting\OfficeSettingController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\FileDeleteController;


Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('userManagement')->as('userManagement.')->group(function () {
    Route::resource('role', RoleController::class);
    Route::get('user/{user}/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::resource('user', UserController::class);
});

//chunk file upload
Route::post('file-upload/chunkStore', [FileUploadController::class, 'chunkFileStore'])->name('fileUpload.chunkStore');

//Fiscal Year
Route::prefix('setting')->group(function () {
    Route::resource('fiscalYear', FiscalYearController::class);
    Route::resource('officeSetting', OfficeSettingController::class);
});


//executive meeting
Route::prefix('executiveMeeting')->as('executiveMeeting.')->group(function () {
    Route::resource('municipalCommittee', MunicipalCommitteeController::class);
    Route::resource('wardCommittee', WardCommitteeController::class);
});

Route::prefix('listRegistrations')->as('listRegistrations.')->group(function (){
    Route::resource('listRegistration', ListRegistrationController::class);
});


//deleteFile

Route::resource('file', FileController::class)->only('destroy');
