<?php

namespace Modules\DigitalBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Circular\Http\Requests\News\StoreNewsRequest;
use Modules\Circular\Http\Requests\News\UpdateNewsRequest;
use Modules\DigitalBoard\Entities\News;

class NewsController extends Controller
{
    public function index($type)
    {
        abort_if(Gate::denies('digitalBoardNews_access'),
            403,
            'You are not allowed to digital board news access'
        );
        dd($type);

        $newses = News::latest()->get();
        return view('digitalboard::news.index', compact('newses'));
    }

    public function create()
    {
        abort_if(Gate::denies('digitalBoardNews_create'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('digitalboard::news.create');
    }

    public function store(StoreNewsRequest $request)
    {

        abort_if(Gate::denies('digitalBoardNews_create'),
            403,
            'You are not allowed to digital board news access'
        );

        News::create($request->validated() + [
                'user_id' => auth()->id()
            ]);
        toast('समाचार सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(News $news)
    {
        abort_if(Gate::denies('digitalBoardNews_access'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('digitalboard::news.show', compact('news'));
    }

    public function edit(News $news)
    {
        abort_if(Gate::denies('digitalBoardNews_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('digitalboard::news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        abort_if(Gate::denies('digitalBoardNews_edit'),
            403,
            'You are not allowed to digital board news access'
        );

        $news->update($request->validated());
        toast('समाचार सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.digitalBoard.news.index'));

    }

    public function destroy(News $news)
    {
        abort_if(Gate::denies('digitalBoardNews_delete'),
            403,
            'You are not allowed to digital board news access'
        );

        $news->delete();
        toast(' समाचार सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }

    public function updateClosedDate(News $news)
    {
            $news->update([
               'closed_at'=> !empty($news->closed_at) ? null :now()
            ]);
        toast('समाचार स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();

    }
}
