<?php

namespace Modules\Roaster\Http\Controllers;

use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;
use Modules\Roaster\Http\Requests\Training\StoreTrainingRequest;
use Modules\Roaster\Http\Requests\Training\UpdateTrainingRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TrainingController extends Controller
{
    public function index()
    {

        abort_if(
            Gate::denies('training_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $trainings = Training::withCount('trainingTrainees')->latest()->get();
        $trainers = Trainer::selectRaw('id,name')->latest()->get();
        return view('roaster::admin.training.index',compact('trainings','trainers'));
    }

    public function create()
    {
        return view('roaster::create');
    }

    public function store(StoreTrainingRequest $request)
    {
        abort_if(
            Gate::denies('training_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );


        $setting = OfficeSetting::first();
        if (!$setting->fiscal_year_id) {
            toast('Fiscal year not added in setting', 'error');
            return back();
        }
        DB::transaction(function () use ($request, $setting) {
            $training = Training::create($request->validated() + [
                    'fiscal_year_id' => $setting->fiscal_year_id
                ]);
            $training->trainers()->sync($request->input('trainers'));
        });
        toast('Training Added Successfully', 'success');
        return back();

    }

    public function show(Training $training)
    {
        return view('roaster::show');
    }

    public function edit(Training $training)
    {

        abort_if(
            Gate::denies('training_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $training->load('fiscalYear');
        $fiscalYears = FiscalYear::get();
        $trainers = Trainer::selectRaw('id,name')->latest()->get();
        return view('roaster::admin.training.edit',compact('training', 'fiscalYears', 'trainers'));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        abort_if(
            Gate::denies('training_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        DB::transaction(function () use ($request, $training) {
            $training->update($request->validated() + [
                    'closed_at' => $request->input('form_status') == 1 ? now() : null
                ]);
            $training->trainers()->sync($request->input('trainers'));
        });

        toast('Training Updated Successfully', 'success');
        return redirect(route('admin.roaster.training.index'));
    }

    public function destroy(Training $training)
    {
        abort_if(
            Gate::denies('training_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $training->trainingTrainees()->delete();
        $training->delete();

        toast('Training Deleted Successfully', 'success');
        return redirect(route('admin.roaster.training.index'));
    }

    public function pdfExport(Training $training)
    {
        $training->load(['trainingTrainees.model' => function ($query) {
            $query->with('province', 'district', 'localBody', 'designation', 'department', 'ethnicity');
        }]);
        if ($training->trainingTrainees) {
            $trainees = $training->trainingTrainees->pluck('model');
        } else {
            $trainees = collect();
        }

        $view = (string)View::make('roaster::admin.training.print_trainee', compact('training', 'trainees'));
        return response()->json([
            'view' => $view
        ]);
    }


    public function setFormStatus(Training $training)
    {
        abort_if(
            Gate::denies('training_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $training->update([
            'closed_at' => empty($training->closed_at) ? now() : null
        ]);

        toast('Training Status Updated Successfully', 'success');
        return redirect(route('admin.roaster.training.index'));
    }
}
