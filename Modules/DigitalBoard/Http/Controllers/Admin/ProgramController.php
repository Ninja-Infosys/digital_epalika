<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\CitizenCharter;
use Modules\DigitalBoard\Entities\Program;
use Modules\DigitalBoard\Http\Requests\Program\StoreProgramRequest;
use Modules\DigitalBoard\Http\Requests\Program\UpdateProgramRequest;

class ProgramController extends Controller
{
    // public function index()
    // {
    //     $programs = Program::
    //     where(function ($q){
    //         if (!empty(auth()->user()->ward_no)) {
    //             $authWardNo = auth()->user()->ward_no;
    //             $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
    //         }
    //     })
    //     ->get();
    //     return view('digitalboard::admin.program.index', compact('programs'));
    // }
    public function index()
    {
        $programs = Program::
         where(function ($q) {
            if (!empty(auth()->user()->ward_no)) {
                $authWardNo = auth()->user()->ward_no;

                // Check if $authWardNo is an array
                if (is_array($authWardNo)) {
                    foreach ($authWardNo as $ward) {
                        $q->orWhereRaw("FIND_IN_SET('$ward', ward) > 0");
                    }
                } else {
                    // If it's not an array, use it directly
                    $q->whereRaw("FIND_IN_SET('$authWardNo', ward) > 0");
                }
            }
        })
        ->get();
        return view('digitalboard::admin.program.index', compact('programs'));
    }



    public function create()
    {
        return view('digitalboard::admin.program.create');
    }

    public function store(StoreProgramRequest $request)
    {
        Program::create($request->validated()+['ward'=>auth()->user()->ward_no,'user_id'=>auth()->id()]);
        toast('कार्यक्रम सफलतापुर्वक थपियो', 'success');
        return redirect(route('admin.digitalBoard.program.index'));

    }



    public function edit(Program $program)
    {
        return view('digitalboard::admin.program.edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->validated());
        toast('कार्यक्रम सफलतापुर्वक अवधि गरियो', 'success');
        return redirect(route('admin.digitalBoard.program.index'));

    }

    public function destroy(Program $program)
    {
        $program->delete();
        toast('कार्यक्रम सफलतापुर्वक मेटियो', 'success');
        return back();
    }
    public function updateProgramStatus(Program $program)
    {
        $program->update([
            'status' => !$program->status
        ]);
        toast( ('कार्यक्रम स्थिति अपडेट गरियो'), 'success');
        return back();
    }
}
