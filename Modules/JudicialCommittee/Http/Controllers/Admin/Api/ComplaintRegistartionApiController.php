<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\JudicialCommittee\Entities\ComplaintSubject;

class ComplaintRegistartionApiController extends Controller
{
    public function complaintRegistrationSetting()
    {
        return [
            'complaintSubjects'=> ComplaintSubject::selectRaw('id,subject')->get()


        ];
    }


}
