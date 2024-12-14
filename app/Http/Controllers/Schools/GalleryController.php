<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index($school_id)
    {
        $school = School::find($school_id);
        $galleries = $school->gallery;

        return view('pages.apps.schools.galleries.index', compact('school', 'galleries'));
    }

    public function store(Request $request)
    {
        $school = School::find($request->school_id);
        $folderName = Str::slug($school->slug_en, '_');
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = uniqid('', false) . '.' . $extension;
                $path = Storage::disk('s3')->putFileAs("Institution/$folderName/Gallery", $image, $fileNameToStore);
                SchoolGallery::create([
                    'school_id' => $school->id,
                    'path' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }

    public function remove($id)
    {
        $schoolGallery = SchoolGallery::find($id);
        if ($schoolGallery->path && Storage::disk('s3')->exists($schoolGallery->getRawOriginal('path')))
            Storage::disk('s3')->delete($schoolGallery->getRawOriginal('path'));

        $schoolGallery->delete();
    }

}
