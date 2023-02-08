<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\EMapTemplateController;
use Modules\EMap\Http\Controllers\Admin\MapController;
use Modules\EMap\Http\Controllers\Admin\MapFeeController;
use Modules\EMap\Http\Controllers\Admin\MapRegistrationController;
use Modules\EMap\Http\Controllers\Admin\OrganizationController;
use Modules\EMap\Http\Controllers\MapSettingController;
use Modules\EMap\Http\Controllers\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::resource('map/mapApply/{mapApply}/map-registration', MapRegistrationController::class)->names('map.map-apply.map-registration');

Route::controller(MapController::class)->prefix('map')->as('map.')->group(function () {
    Route::prefix('mapApply/{mapApply}/notice')->as('map-apply.notice.')->group(function () {
        Route::prefix('upload')->as('upload.')->group(function () {
            Route::post('storeTemplateData/{applicationFormTypeEnum}/{noticeTypeEnum}', 'storeTemplateData')->name('store-template-data');
            Route::get('getTemplateData/{applicationFormTypeEnum}/{noticeTypeEnum}', 'getTemplateData')->name('get-template-data');
            Route::put('reject/{noticeTypeEnum}', 'reject')->name('reject');
        });
    });
    Route::get('mapApply/{mapApply}/noticeList/{applicationFormTypeEnum}', 'noticeList')->name('mapApply.noticeList');
    Route::get('mapApply/{mapApply}/register', 'register')->name('mapApply.register');
    Route::get('mapApply/{mapApply}/{applicationFormTypeEnum}/showFullDetail/{noticeTypeEnum}', 'show')->name('mapApply.show');
    Route::put('mapApply/{mapApply}/applyMapNotice/{applyMapNotice}/reject', 'rejectApplication')->name('mapApply.reject');
    Route::get('mapApply/{applicationFormTypeEnum}', 'index')->name('mapApply.index');
});

Route::prefix('setting')->group(function () {
    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
    Route::post('eMapTemplate/getStaticTemplate', [EMapTemplateController::class, 'getStaticTemplate'])->name('template-emap.get-static-template');
    Route::get('eMapTemplate/enumList', [EMapTemplateController::class, 'enumList'])->name('eMapTemplate.enumList');
    Route::get('{noticeTypeEnum}/eMapTemplate/{eMapTemplate}/updateStatus', [EMapTemplateController::class, 'updateStatus'])->name('eMapTemplate.updateStatus');
    Route::resource('{noticeTypeEnum}/eMapTemplate', EMapTemplateController::class)->names('eMapTemplate');
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'emap::admin.file.file')->name('file');
});

//report

Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('/', 'getRequiredData')->name('report');
    Route::post('report-data', 'report')->name('report-data');
});
