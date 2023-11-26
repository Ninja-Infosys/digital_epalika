<?php

namespace Modules\Roaster\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Roaster\Entities\Training;
use Modules\Roaster\Enums\TrainingTypeEnum;


class TrainingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $value = $request->query('value');

        $trainings = Training::when($value, function ($query) use ($value) {
            return $query->withType(TrainingTypeEnum::from($value));
        })->get();

        return response()->json($trainings);
    }



}
