<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Roaster\Entities\Training;
use Modules\Roaster\Transformers\TraineeResource;

class TraineeApiController extends Controller
{
    public function training()
    {
        $trainings = Training::with('trainers')->whereNull('closed_at')
            ->get()->filter(function ($data) {
                return $data->form_status_according_to_trainee_date === true;
            });

        return response()->json(TraineeResource::collection($trainings));
    }
}
