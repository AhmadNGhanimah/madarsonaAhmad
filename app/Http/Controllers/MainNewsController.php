<?php

namespace App\Http\Controllers;

use App\DataTables\AllNewsDataTable;
use App\Http\Requests\School\NewsCreateRequest;
use App\Models\News;
use App\Models\School;
use Illuminate\Support\Facades\Storage;

class MainNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AllNewsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.news.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->only(['title_ar', 'title_en', 'description_en', 'description_ar', 'active_days',
            'is_active', 'is_urgent', 'youtube_link']);
        $data['expiration_date'] = date('Y-m-d', strtotime('+' . $request->active_days . ' days'));


        if ($request->hasFile('image_path')) {
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            $data['image_path'] = Storage::disk('s3')
                ->putFileAs("News", $request->file('image_path'), $fileNameToStore);
        }


        News::create($data);

        return response()->json(['message' => 'Added News Successfully', 'status' => 200]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('pages.apps.news.create', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(News $news, NewsCreateRequest $request)
    {
        $data = $request->only(['title_ar', 'title_en', 'description_en', 'description_ar',
            'active_days', 'is_active', 'is_urgent', 'youtube_link']);
        $data['expiration_date'] = date('Y-m-d', strtotime('+' . $request->active_days . ' days'));


        if ($request->hasFile('image_path')) {
            $extension = $request->file('image_path')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            if ($news->getRawOriginal('image_path'))
                Storage::disk('s3')->delete($news->getRawOriginal('image_path'));
            $data['image_path'] = Storage::disk('s3')
                ->putFileAs("News", $request->file('image_path'), $fileNameToStore);
        }

        $news->update($data);

        return response()->json(['message' => 'Updated Successfully', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($news_id)
    {
        $news = News::findOrFail($news_id);
        if ($news->getRawOriginal('image_path'))
            Storage::disk('s3')->delete($news->getRawOriginal('image_path'));

        $news->delete();

    }
}
