<?php

namespace Modules\BusinessRegistration\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\BusinessRegistration\Entities\Forum;
use Modules\BusinessRegistration\Entities\ForumRenew;
use Modules\BusinessRegistration\Http\Requests\ForumRenew\StoreForumRenewRequest;
use Modules\BusinessRegistration\Http\Requests\ForumRenew\UpdateForumRenewRequest;

class ForumRenewController extends Controller
{
    public function index(Forum $forum)
    {
        $forumRenews = ForumRenew::with('fiscalYear')->where('forum_id', $forum->id)->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['date', 'payment_receipt'], request('search'));
            }
        })->latest()->paginate(15);
        return view('businessregistration::admin.forumRenew.index', compact('forum', 'forumRenews'));
    }

    public function create(Forum $forum)
    {
        return view('businessregistration::admin.forumRenew.create', compact('forum'));
    }

    public function store(StoreForumRenewRequest $request, Forum $forum)
    {
        $forum->forumRenew()->create($request->validated() + [
                'fiscal_year_id' => officeSetting()->fiscal_year_id,
            ]);
        if (!empty($request->validated()['files'])) {
            $this->uploadDocuments($request, $forum);
        }


        toast('फर्म नवीकरण सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.businessRegistration.forum.forumRenew.index', $forum));

    }

    public function show(Forum $forum, ForumRenew $forumRenew)
    {
        return view('businessregistration::admin.forumRenew.show', compact('forum', 'forumRenew'));
    }

    public function edit(Forum $forum, ForumRenew $forumRenew)
    {
        return view('businessregistration::admin.forumRenew.edit', compact('forum', 'forumRenew'));
    }

    public function update(UpdateForumRenewRequest $request, Forum $forum, ForumRenew $forumRenew)
    {
        $forumRenew->update($request->validated());

        if (!empty($request->validated()['files'])) {
            $this->uploadDocuments($request, $forumRenew);
        }

        toast('फर्म नवीकरण सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.businessRegistration.forum.forumRenew.index', $forum));
    }


    private function uploadDocuments($request, $forumRenew)
    {
        foreach ($request->validated()['files'] as $file) {
            $forumRenew->files()->create([
                'file_name' => $file['file_name'] ?? pathinfo($file['file']->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $file['file']->getClientOriginalExtension(),
                'file' => $file['file']->store('forumRenew/' . Str::slug($forumRenew->main_person, '_') . '/files', 'public'),
            ]);
        }
    }
    public function updateFile(Request $request, forumRenew $forumRenew)
    {
        if ($request->hasFile('file') && $file = $forumRenew->getRawOriginal('file')) {
            $this->deleteFile($file);
        }
        $data = $request->validate([
            'file' => 'required |mimes:png,jpg,jpeg,pdf'
        ]);

        $forumRenew->update($data);
        toast('फाईल सफलतापूर्वक थपियो', 'success');
        return back();
    }

}
