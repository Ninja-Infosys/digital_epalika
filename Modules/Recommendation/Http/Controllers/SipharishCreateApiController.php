<?php

namespace Modules\Recommendation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Transformers\SifarishFormFieldResource;
use Modules\Recommendation\Transformers\SipharishCreateResource;
use Modules\Recommendation\Transformers\SipharishFormFieldResource;
use Modules\Recommendation\Transformers\SipharishFormTypeResource;

class SipharishCreateApiController extends Controller
{
    public function index()
    {
        $sifarishCategories = SipharisCategory::with('createdBy')->where('status', 1)->get();
        return response()->json(SipharishCreateResource::collection($sifarishCategories));
    }

    public function show(SipharisCategory $sipharisCategory)
    {

        $sifarishSubCategories = SipharisSubCategory::where('sipharis_category_id', $sipharisCategory->id)
            ->where('status', 1)
            ->get();
        return response()->json(SipharishCreateResource::collection($sifarishSubCategories));
    }

    public function subCategoryList()
    {
        $sifarishCategories = SipharisSubCategory::with('createdBy')->where('status', 1)->get();
        return response()->json(SipharishCreateResource::collection($sifarishCategories));
    }

    public function subCategoryShow(SipharisSubCategory $sipharisSubCategory)
    {
        $sipharisFormTypes = SipharishFormType::with('createdBy')->where('status', 1)
            ->where('sipharis_sub_category_id', $sipharisSubCategory->id)
            ->get();
        return response()->json(SipharishFormTypeResource::collection($sipharisFormTypes));
    }

    public function sipharishFormTypeList(SipharishFormType $sipharishFormType)
    {
        $fields = SipharishFormType::with('sipharisFormFields.SipharishFormFields.createdBy', 'sipharisFormFields.createdBy')
            ->find($sipharishFormType->id)
            ?->sipharisFormFields;
        return response()->json(SipharishFormFieldResource::collection($fields));
    }
}
