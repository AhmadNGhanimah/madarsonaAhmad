<?php

namespace App\Http\Controllers\Schools;

use App\DataTables\Schools\NewsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\NewsCreateRequest;
use App\Models\News;
use App\Models\School;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($school_id, NewsDataTable $dataTable)
    {
        $school = School::where('id', $school_id)->select('id', 'name_en')->firstOrFail();
        return $dataTable->with('school_id', $school_id)
            ->render('pages.apps.schools.news.list', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($school_id)
    {
        return view('pages.apps.schools.news.create', compact('school_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($school_id, NewsCreateRequest $request)
    {
        $data = $request->only(['title_ar', 'title_en', 'description_en', 'description_ar', 'active_days', 'is_active', 'youtube_link']);
        $data['school_id'] = $school_id;
        $data['expiration_date'] = date('Y-m-d', strtotime('+' . $request->active_days . ' days'));

        $school = School::findOrFail($school_id);
        $folderName = $school->slug_en;

        if ($request->hasFile('image_path')) {
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            $data['image_path'] = Storage::disk('s3')
                ->putFileAs("Institution/$folderName/News", $request->file('image_path'), $fileNameToStore);
        }


        News::create($data);

        return response()->json(['message' => 'Added News Successfully', 'status' => 200]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($school_id, News $news)
    {
        return view('pages.apps.schools.news.create', compact('school_id', 'news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($school_id, News $news, NewsCreateRequest $request)
    {
        $data = $request->only(['title_ar', 'title_en', 'description_en', 'description_ar', 'active_days', 'is_active', 'youtube_link']);
        $data['expiration_date'] = date('Y-m-d', strtotime('+' . $request->active_days . ' days'));

        $school = School::findOrFail($school_id);
        $folderName = $school->slug_en;

        if ($request->hasFile('image_path')) {
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            if ($news->getRawOriginal('image_path'))
                Storage::disk('s3')->delete($news->getRawOriginal('image_path'));
            $data['image_path'] = Storage::disk('s3')
                ->putFileAs("Institution/$folderName/News", $request->file('image_path'), $fileNameToStore);
        }

        $news->update($data);

        return response()->json(['message' => 'Updated Successfully', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school_id, $news_id)
    {
        $news = News::findOrFail($news_id);
        if ($news->getRawOriginal('image_path'))
            Storage::disk('s3')->delete($news->getRawOriginal('image_path'));

        $news->delete();

    }
}
