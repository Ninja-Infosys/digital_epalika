<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Carbon\CarbonPeriod;
use Modules\TaskManagement\Entities\DailyTask;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class DashboardController extends Controller
{
    public function __invoke()
    {

        return view('taskmanagement::admin.dashboard');
    }

}
