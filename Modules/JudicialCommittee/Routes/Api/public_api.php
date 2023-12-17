<?php

use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\Admin\GrievanceApiFormController;
use Modules\JudicialCommittee\Http\Controllers\Admin\Api\ComplaintRegistartionApiController;

Route::get('complaintRegistrationSetting', [ComplaintRegistartionApiController::class, 'complaintRegistrationSetting']);
