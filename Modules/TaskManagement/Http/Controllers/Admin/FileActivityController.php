<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\FileActivity;
use Modules\TaskManagement\Entities\FileTracking;

class FileActivityController extends Controller
{
    public function updateReceivedStatus(FileTracking $fileTracking, FileActivity $fileActivity)
    {
        $fileActivity->update([
            'is_received' => !$fileActivity->is_received
        ]);

        toast('Status Updated Successfully', 'success');
        return back();
    }

    public function updateStatus(FileTracking $fileTracking, FileActivity $fileActivity)
    {
        $fileActivity->update([
            'status' => !$fileActivity->status
        ]);

        toast('Status Updated Successfully', 'success');
        return back();
    }
}
