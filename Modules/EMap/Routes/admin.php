<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\MapController;
use Modules\EMap\Http\Controllers\Admin\MapFeeController;
use Modules\EMap\Http\Controllers\Admin\MapRegistrationController;
use Modules\EMap\Http\Controllers\Admin\OrganizationController;
use Modules\EMap\Http\Controllers\MapSettingController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::resource('map/mapApply/{mapApply}/map-registration', MapRegistrationController::class)->names('map.map-apply.map-registration');

Route::controller(MapController::class)->prefix('map')->as('map.')->group(function () {
    Route::prefix('mapApply/{mapApply}/notice')->as('map-apply.notice.')->group(function () {
        Route::get('officeLetter', 'officeLetter')->name('office-letter');
        Route::get('noticeLetter', 'noticeLetter')->name('notice-letter');
        Route::get('mapArrears', 'mapArrears')->name('map-arrears');
        Route::get('landArrears', 'landArrears')->name('land-arrears');
        Route::get('technicianNotice', 'technicianNotice')->name('technician-notice');
        Route::get('chAgreement', 'chAgreement')->name('ch-agreement');
        Route::get('agentAgreement', 'agentAgreement')->name('agent-agreement');
        Route::get('permissionLetter', 'permissionLetter')->name('permission-letter');
        Route::get('level', 'level')->name('level');
        Route::get('supervisor', 'superVisor')->name('supervisor');
        Route::get('superstructure-permission', 'superStructurePermission')->name('superstructure-permission');
        Route::get('superstructure', 'superStructure')->name('superstructure');
        Route::get('plinth-level-supervisor-report', 'plinthLevelSupervisorReport')->name('plinth-level-supervisor-report');
        Route::get('first-phase-consultant-report','firstPhaseConsultantReport')->name('first-phase-consultant-report');
        Route::get('first-phase-technician-report','firstPhaseTechnicianReport')->name('first-phase-technician-report');
        Route::get('second-phase-consultant-report','secondPhaseConsultantReport')->name('second-phase-consultant-report');
        Route::get('second-phase-technician-report','secondPhaseTechnicianReport')->name('second-phase-technician-report');
        Route::prefix('upload')->as('upload.')->group(function (){
            Route::post('notice','notice')->name('notice');
            Route::post('application','application')->name('application');
            Route::post('bond','bond')->name('bond');
            Route::post('report','report')->name('report');
            Route::post('agreement','agreement')->name('agreement');
            Route::post('order','order')->name('order');
            Route::post('certificate','certificate')->name('certificate');
            Route::post('heir','heir')->name('heir');
            Route::post('permission','permission')->name('permission');
        });

    });
    Route::get('mapApply/{mapApply}', 'show')->name('mapApply.show');
    Route::put('mapApply/{mapApply}/applyMapNotice/{applyMapNotice}/reject', 'rejectApplication')->name('mapApply.reject');
    Route::get('mapApply', 'index')->name('mapApply.index');
});


Route::prefix('setting')->group(function () {
    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
});

Route::prefix('files')->as('files.')->group(function (){
    Route::view('file', 'emap::admin.file.file')->name('file');
});

Route::view('darta', 'emap::admin.darta_fee.darta')->name('darta');
Route::view('firstphase', 'emap::admin.noticeletter.firstphase');
Route::view('firstphases', 'emap::admin.noticeletter.firstphases');
Route::view('structure', 'emap::admin.tipani.structure');
Route::view('sanso', 'emap::admin.tipani.sanso');
Route::view('superstructure', 'emap::admin.tipani.superstructure');
Route::view('sanpermission', 'emap::admin.tipani.sanpermission');
Route::view('estd', 'emap::admin.tipani.estd');
Route::view('second', 'emap::admin.tipani.second');
Route::view('secondphase', 'emap::admin.tipani.secondphase');
Route::view('certificate', 'emap::admin.tipani.certificate');
Route::view('parmana', 'emap::admin.certificate.parmana');
Route::view('namsari', 'emap::admin.certificate.namsari');
Route::view('detail', 'emap::admin.certificate.detail');
Route::view('bloodrelation', 'emap::admin.certificate.bloodrelation');
Route::view('manjuri', 'emap::admin.certificate.manjuri');
Route::view('supervisor', 'emap::admin.notice.supervisor');
Route::view('PlinthLevelSupervisorReport', 'emap::admin.notice.PlinthLevelSupervisorReport');
