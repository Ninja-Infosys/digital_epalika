<?php


use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\Api\ComplaintRegistartionApiController;





Route::post('complaintRegistration', [ComplaintRegistartionApiController::class, 'complaintRegistration']);
Route::get('registeredComplain', [ComplaintRegistartionApiController::class, 'registeredComplain']);
