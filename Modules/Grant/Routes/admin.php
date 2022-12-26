<?php

use Illuminate\Support\Facades\Route;
use Modules\Grant\Entities\CooperativeType;
use Modules\Grant\Http\Controllers\Admin\CooperativeController;
use Modules\Grant\Http\Controllers\Admin\DashboardController;
use Modules\Grant\Http\Controllers\Admin\EnterprisesController;
use Modules\Grant\Http\Controllers\Admin\FarmerController;
use Modules\Grant\Http\Controllers\Admin\GrantController;
use Modules\Grant\Http\Controllers\Admin\GrantDetailController;
use Modules\Grant\Http\Controllers\Admin\GroupController;
use Modules\Grant\Http\Controllers\Admin\Report\FarmerReportController;
use Modules\Grant\Http\Controllers\Admin\Report\GrantReportController;
use Modules\Grant\Http\Controllers\Admin\Setting\AffiliationController;
use Modules\Grant\Http\Controllers\Admin\Setting\CooperativeTypeController;
use Modules\Grant\Http\Controllers\Admin\Setting\EnterpriseTypeController;
use Modules\Grant\Http\Controllers\Admin\Setting\GrantProgramController;
use Modules\Grant\Http\Controllers\Admin\Setting\GrantOfficeController;
use Modules\Grant\Http\Controllers\Admin\Setting\GrantTypeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grantType', GrantTypeController::class);
    Route::resource('enterpriseType', EnterpriseTypeController::class);
    Route::resource('affiliation', AffiliationController::class);
    Route::resource('cooperativeType', CooperativeTypeController::class);
    Route::resource('grantProgram', GrantProgramController::class);
    Route::resource('grantOffice', GrantOfficeController::class);
});

Route::prefix('grantee')->group(function (){
    Route::resource('farmer', FarmerController::class);
    Route::resource('group',GroupController::class);
    Route::resource('cooperative', CooperativeController::class);
    Route::resource('enterprise',EnterprisesController::class);
});

Route::resource('grant', GrantController::class);
Route::resource('grantDetail', GrantDetailController::class)->except('store','update');

Route::controller(FarmerReportController::class)->prefix('report/farmer')->as('report.farmer.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});

Route::controller(GrantReportController::class)->prefix('report/grant')->as('report.grant.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});

Route::controller(GroupReportController::class)->prefix('report/group')->as('report.group.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});

Route::controller(EnterpriseReportController::class)->prefix('report/enterprise')->as('report.enterprise.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});

Route::controller(CooperativeReportController::class)->prefix('report/cooperative')->as('report.cooperative.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});
