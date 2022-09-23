<?php

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

use Modules\HelpDesk\Http\Controllers\FrontController;

Route::prefix('helpdesk')->group(function () {
    Route::get('/', 'HelpDeskController@index');
});

Route::get('service/{service}', [FrontController::class, 'showServiceDetail'])->name('service.view');
Route::view('/helpdesk', 'helpdesk::frontend.index')->name('helpdesk.helpdesk');
Route::view('/service', 'helpdesk::frontend.services.service');
