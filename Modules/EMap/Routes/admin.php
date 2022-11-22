<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\EMapTemplateController;
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
        Route::get('sending-details', 'sendingDetails')->name('sendingDetails');
        Route::get('mapArrears', 'mapArrears')->name('map-arrears');
        Route::get('landArrears', 'landArrears')->name('land-arrears');
        Route::get('technicianNotice', 'technicianNotice')->name('technician-notice');
        Route::get('chAgreement', 'chAgreement')->name('ch-agreement');
        Route::get('agentAgreement', 'agentAgreement')->name('agent-agreement');
        Route::get('permissionLetter', 'permissionLetter')->name('permission-letter');
        Route::get('level', 'level')->name('level');
        Route::get('supervisor', 'superVisor')->name('supervisor');
        Route::get('superstructure-permission', 'superStructurePermission')->name('superstructure-permission');
        Route::get('revised-superstructure-permit', 'revisedSuperStructurePermit')->name('revisedSuperStructurePermit');
        Route::get('revised-superstructure-permit-order', 'revisedSuperStructurePermitOrder')->name('revisedSuperStructurePermitOrder');
        Route::get('construction-completion-certificate', 'constructionCompletionCertificate')->name('constructionCompletionCertificate');
        Route::get('house-map-namsari', 'houseMapNamsari')->name('houseMapNamsari');
        Route::get('superstructure', 'superStructure')->name('superstructure');
        Route::get('plinth-level-supervisor-report', 'plinthLevelSupervisorReport')->name('plinth-level-supervisor-report');
        Route::get('first-phase-consultant-report', 'firstPhaseConsultantReport')->name('first-phase-consultant-report');
        Route::get('first-phase-technician-report', 'firstPhaseTechnicianReport')->name('first-phase-technician-report');
        Route::get('second-phase-consultant-report', 'secondPhaseConsultantReport')->name('second-phase-consultant-report');
        Route::get('second-phase-technician-report', 'secondPhaseTechnicianReport')->name('second-phase-technician-report');
        Route::get('permission', 'permissionView')->name('permission');
        Route::get('heir', 'heirView')->name('heir');
        Route::get('building-construction-completion-certificate', 'buildingConstructionCompletionCertificate')->name('building-construction-completion-certificate');
        Route::prefix('upload')->as('upload.')->group(function () {
            Route::post('storeTemplateData/{noticeTypeEnum}', 'storeTemplateData')->name('store-template-data');
            Route::get('getTemplateData/{noticeTypeEnum}', 'getTemplateData')->name('get-template-data');
            Route::put('reject/{noticeTypeEnum}','reject')->name('reject');
        });
    });
    Route::get('mapApply/{mapApply}/noticeList/{applicationFormTypeEnum}', 'noticeList')->name('mapApply.noticeList');
    Route::get('mapApply/{mapApply}/{applicationFormTypeEnum}/showFullDetail', 'show')->name('mapApply.show');
    Route::put('mapApply/{mapApply}/applyMapNotice/{applyMapNotice}/reject', 'rejectApplication')->name('mapApply.reject');
    Route::get('mapApply/{applicationFormTypeEnum}', 'index')->name('mapApply.index');
});

Route::prefix('setting')->group(function () {
    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
    Route::post('eMapTemplate/getStaticTemplate', [EMapTemplateController::class, 'getStaticTemplate'])->name('template-emap.get-static-template');
    Route::resource('eMapTemplate', EMapTemplateController::class);
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'emap::admin.file.file')->name('file');
});

Route::view('nbc', 'emap::admin.nbc.nbc')->name('nbc');
Route::view('type', 'emap::admin.static.type')->name('type');
Route::view('officeletter', 'emap::admin.notice.office-letter')->name('office-letter');
Route::view('noticeletter', 'emap::admin.notice.notice-letter')->name('notice-letter');
Route::view('naksa_certificate', 'emap::admin.notice.naksa_certificate')->name('naksa_certificate');
Route::view('revised-superstructure-permit', 'emap::admin.notice.revised_superstructure_Permit')->name('revised-superstructure-permit');
Route::view('level', 'emap::admin.notice.level')->name('level');
Route::view('technician_notice', 'emap::admin.notice.technician-notice')->name('technician_notice');
Route::view('superstructure', 'emap::admin.notice.superstructure')->name('superstructure');
Route::view('building', 'emap::admin.notice.building_construction_completion_certificate')->name('building');
