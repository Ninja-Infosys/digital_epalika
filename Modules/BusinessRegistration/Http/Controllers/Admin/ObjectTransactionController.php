<?php

namespace Modules\BusinessRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\BusinessRegistration\Entities\ObjectTransaction;
use Modules\BusinessRegistration\Http\Requests\ObjectTransaction\StoreObjectTransactionRequest;
use Modules\BusinessRegistration\Http\Requests\ObjectTransaction\UpdateObjectTransactionRequest;

class ObjectTransactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('objectTransaction_access'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransactions = ObjectTransaction::get();
        return view('businessregistration::admin.setting.objectTransaction.index',compact('objectTransactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('objectTransaction_create'),
            403,
            'You are not allowed to digital board news access'
        );

        return view('businessregistration::admin.setting.objectTransaction.create');
    }

    public function store(StoreObjectTransactionRequest $request)
    {
        abort_if(Gate::denies('objectTransaction_create'),
            403,
            'You are not allowed to digital board news access'
        );
        ObjectTransaction::create($request->validated());
        toast(' कारोबार गर्ने वस्तु  सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function show($id)
    {
        abort_if(Gate::denies('objectTransaction_access'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('businessregistration::show');
    }

    public function edit(ObjectTransaction $objectTransaction)
    {
        abort_if(Gate::denies('objectTransaction_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('businessregistration::admin.setting.objectTransaction.edit',compact('objectTransaction'));

    }

    public function update(UpdateObjectTransactionRequest $request, ObjectTransaction $objectTransaction)
    {
        abort_if(Gate::denies('objectTransaction_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransaction->update($request->validated());
        toast('  सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.businessRegistration.setting.objectTransaction.index'));
    }

    public function destroy(ObjectTransaction $objectTransaction)
    {
        abort_if(Gate::denies('objectTransaction_delete'),
            403,
            'You are not allowed to digital board news access'
        );
        $objectTransaction->delete();
        return back();
    }
}
