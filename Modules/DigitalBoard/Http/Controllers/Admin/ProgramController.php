<?php

namespace Modules\DigitalBoard\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DigitalBoard\Entities\Program;
use Modules\DigitalBoard\Http\Requests\Program\StoreProgramRequest;
use Modules\DigitalBoard\Http\Requests\Program\UpdateProgramRequest;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('digitalboard::admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('digitalboard::admin.program.create');
    }

    public function store(StoreProgramRequest $request)
    {
        Program::create($request->validated());
        toast('कार्यक्रम सफलतापुर्वक थपियो', 'success');
        return back();
    }



    public function edit(Program $program)
    {
        return view('digitalboard::admin.program.edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->validated());
        toast('कार्यक्रम सफलतापुर्वक अवधि गरियो', 'success');
        return back();
    }

    public function destroy(Program $program)
    {
        $program->delete();
        toast('कार्यक्रम सफलतापुर्वक मेटियो', 'success');
        return back();
    }
}
