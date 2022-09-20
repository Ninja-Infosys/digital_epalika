<?php

namespace App\Http\Controllers\Admin\Setting\Units;

use App\Models\Settings\FiscalYear;
use App\Models\Settings\Units\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unitType_access'),
            403,
            'You are not allowed to digital board news access'
        );
        $types = Type::get();
        return view('admin.setting.units.type.index', compact('types'));
    }

    public function create()
    {
        abort_if(Gate::denies('unitType_create'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.setting.units.type.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('unitType_create'),
            403,
            'You are not allowed to digital board news access'
        );
        $validationData = $request->validate(
            ['title' => 'required', Rule::unique('types', 'title')->withoutTrashed()],
            ['title.required' => 'मापन एकाइ प्रकार अनिवार्य छ|', 'title.unique' => 'मापन एकाइ प्रकार पहिले नै अवस्थित छ']
        );

        Type::create($validationData);
        toast('मापन एकाइ प्रकार सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.units.type.index'));
    }

    public function show(Type $type)
    {
        //
    }

    public function edit(Type $type)
    {
        abort_if(Gate::denies('unitType_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.setting.units.type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        abort_if(Gate::denies('unitType_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        $validationData = $request->validate(
            ['title' => 'required', Rule::unique('types', 'title')->withoutTrashed()->ignore($type)],
            ['title.required' => 'मापन एकाइ प्रकार अनिवार्य छ|', 'title.unique' => 'मापन एकाइ प्रकार पहिले नै अवस्थित छ']
        );
        $type->update($validationData);

        toast('मापन एकाइ प्रकार सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.units.type.index'));
    }

    public function destroy(Type $type)
    {
        abort_if(Gate::denies('unitType_delete'),
            403,
            'You are not allowed to digital board news access'
        );
        $type->delete();
        toast('मापन एकाइ प्रकार सफलतापूर्वक मेटाइयो', 'success');
        return redirect(route('admin.units.type.index'));
    }
}
