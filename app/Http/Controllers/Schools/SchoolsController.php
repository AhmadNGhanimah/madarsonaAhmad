<?php

namespace App\Http\Controllers\Schools;

use App\DataTables\SchoolsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\SchoolCreateRequest;
use App\Models\City;
use App\Models\Discounts;
use App\Models\InstitutionType;
use App\Models\Region;
use App\Models\School;
use App\Models\SchoolGallery;
use App\Models\SchoolGender;
use App\Models\SchoolLink;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SchoolsController extends Controller
{

    public function index(SchoolsDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.schools.list');
    }

    public function create()
    {
        $institutionTypes = InstitutionType::select('id', 'title_ar as name_ar')->get();
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', 1)->get(['id', 'name_ar']);
        $discounts = Discounts::select('id', 'title_ar as name_ar')->get();
        $last_order = School::orderByDesc('sort_order')->first('sort_order');
        return view('pages/apps.schools.create',
            compact('institutionTypes', 'cities', 'regions', 'discounts', 'last_order'));
    }

    public function store(SchoolCreateRequest $request)
    {
        $data = $request->except('_token', 'genders', 'discounts', 'school_links', 'logo_image', 'brochure');
        $folderName = Str::slug($request->name_en, '_');

        if ($request->hasFile('logo_image')) {
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            $data['logo_image'] = Storage::disk('s3')->putFileAs("Institution/$folderName", $request->file('logo_image'), $fileNameToStore);
        }

        if ($request->hasFile('brochure')) {
            $extension = $request->file('brochure')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            $data['brochure'] = Storage::disk('s3')
                ->putFileAs("Institution/$folderName/Brochure", $request->file('brochure'), $fileNameToStore);
        }

        $data['country_id'] = 1;
        $school = School::updateOrcreate($data);

        if ($request->discounts) {
            $school->discounts()->sync($request->discounts);
        }

        if ($request->genders) {
            foreach ($request->genders as $gender) {
                SchoolGender::create([
                    'school_id' => $school->id,
                    'type' => $gender,
                ]);
            }
        }

        if ($request->school_links) {
            foreach ($request->school_links as $type => $link) {
                SchoolLink::create([
                    'school_id' => $school->id,
                    'type' => $type,
                    'url' => $link,
                ]);
            }
        }

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }

    public function show(School $school)
    {

    }

    public function edit(School $school)
    {
        $institutionTypes = InstitutionType::select('id', 'title_ar as name_ar')->get();
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', $school->city_id)->get(['id', 'name_ar']);
        $discounts = Discounts::select('id', 'title_ar as name_ar')->get();
        $last_order = School::orderByDesc('sort_order')->first('sort_order');
        $genders_type = $school->genders->pluck('type')->toArray();
        $discounts_id = $school->discounts->pluck('id')->toArray();
        $school_links = [];
        foreach ($school->links as $link) {
            $school_links[$link->type] = $link->url;
        }
        return view('pages/apps.schools.create',
            compact('school', 'institutionTypes', 'cities', 'regions',
                'discounts', 'last_order', 'genders_type', 'discounts_id', 'school_links'));
    }

    public function update(SchoolCreateRequest $request, School $school)
    {
        $data = $request->except('_token', 'genders', 'discounts', 'school_links', 'logo_image', 'brochure');
        $folderName = Str::slug($request->name_en, '_');
        if ($request->hasFile('logo_image')) {
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            if ($school->getRawOriginal('logo_image'))
                Storage::disk('s3')->delete($school->getRawOriginal('logo_image'));
            $data['logo_image'] = Storage::disk('s3')
                ->putFileAs("Institution/$folderName", $request->file('logo_image'), $fileNameToStore);
        }

        if ($request->hasFile('brochure')) {
            $extension = $request->file('brochure')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            if ($school->getRawOriginal('brochure'))
                Storage::disk('s3')->delete($school->getRawOriginal('brochure'));
            $data['brochure'] = Storage::disk('s3')
                ->putFileAs("Institution/$folderName/Brochure", $request->file('brochure'), $fileNameToStore);
        }

        $school->update($data);

        if ($request->discounts) {
            $school->discounts()->sync($request->discounts);
        }

        if ($request->genders) {
            SchoolGender::where('school_id', $school->id)->delete();
            foreach ($request->genders as $gender) {
                SchoolGender::create([
                    'school_id' => $school->id,
                    'type' => $gender,
                ]);
            }
        }

        if ($request->school_links) {
            SchoolLink::where('school_id', $school->id)->delete();
            foreach ($request->school_links as $type => $link) {
                SchoolLink::create([
                    'school_id' => $school->id,
                    'type' => $type,
                    'url' => $link,
                ]);
            }
        }

        return response()->json(['message' => 'Update Successfully', 'status' => 200]);
    }

    public function destroy(School $school)
    {
        if ($school->logo_image)
            Storage::disk('s3')->delete($school->getRawOriginal('logo_image'));

        if ($school->getRawOriginal('brochure') )
            Storage::disk('s3')->delete($school->getRawOriginal('brochure'));

        $schoolGalleries = SchoolGallery::where('school_id', $school->id)->get();

        foreach ($schoolGalleries as $gallery) {
            if ($gallery->getRawOriginal('path') && Storage::disk('s3')->exists($gallery->getRawOriginal('path')))
                Storage::disk('s3')->delete($gallery->getRawOriginal('path'));
        }

        $school->delete();
    }
}
