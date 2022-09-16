<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\DigitalBoard\Entities\News;

class NewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('digitalBoardNews_access'),
            403,
            'You are not allowed to digital board news access'
        );

        return view('digitalboard::news.index');
    }

    public function create()
    {
        return view('digitalboard::news.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(News $news)
    {
        return view('digitalboard::news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('digitalboard::news.edit',compact('news'));
    }

    public function update(Request $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}
