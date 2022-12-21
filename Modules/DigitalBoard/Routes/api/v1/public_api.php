<?php

use Modules\DigitalBoard\Http\Controllers\Api\v1\PublicApiController;

Route::get('employee', [PublicApiController::class, 'employee'])->name('api-public.employee');
Route::get('publicRepresentative', [PublicApiController::class, 'publicRepresentative'])->name('api-public.public-representative');

Route::get('notice/{notice}', [PublicApiController::class, 'showNotice'])->name('api-public.show-notice');
Route::get('notice', [PublicApiController::class, 'notice'])->name('api-public.notice');
Route::get('news', [PublicApiController::class, 'news'])->name('api-public.news');
