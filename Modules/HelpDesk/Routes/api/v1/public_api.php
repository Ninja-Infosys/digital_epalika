<?php

use Modules\HelpDesk\Http\Controllers\Api\v1\PublicApiController;

Route::get('branch/{branch}/service', [PublicApiController::class, 'getBranchService'])->name('api-public.get-branch-service');
Route::get('branch/{branch}', [PublicApiController::class, 'getBranchDetail'])->name('api-public.detail-branch-get');
Route::get('branch', [PublicApiController::class, 'branch'])->name('api-public.branch');

Route::get('service', [PublicApiController::class, 'getAllService'])->name('api-public.get-all-service');
Route::get('service/{service}', [PublicApiController::class, 'getService'])->name('api-public.get-service');
