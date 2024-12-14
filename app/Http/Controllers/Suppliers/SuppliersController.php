<?php

namespace App\Http\Controllers\Suppliers;

use App\DataTables\SchoolsDataTable;
use App\DataTables\SuppliersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\School\SchoolCreateRequest;
use App\Http\Requests\Supplier\SupplierCreateRequest;
use App\Models\City;
use App\Models\Discounts;
use App\Models\SupplierLink;
use App\Models\SupplierType;
use App\Models\Region;
use App\Models\School;
use App\Models\SchoolGallery;
use App\Models\SchoolGender;
use App\Models\SchoolLink;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuppliersController extends Controller
{

    public function index(SuppliersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.suppliers.list');
    }

    public function create()
    {
        $types = SupplierType::select('id', 'title_ar as name_ar')->get();
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', 1)->get(['id', 'name_ar']);
        $last_order = Supplier::orderByDesc('sort_order')->first('sort_order');
        return view('pages.apps.suppliers.create',
            compact('types', 'cities', 'regions', 'last_order'));
    }

    public function store(SupplierCreateRequest $request)
    {
        $data = $request->except('_token', 'supplier_links', 'logo_image');

        $folderName = Str::slug($request->name_en, '_');


        if ($request->hasFile('logo_image')) {
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            $data['logo_image'] = Storage::disk('s3')->putFileAs("Supplier/$folderName", $request->file('logo_image'), $fileNameToStore);
        }


        $data['country_id'] = 1;
        $supplier = Supplier::updateOrcreate($data);


        if ($request->supplier_links) {
            foreach ($request->supplier_links as $type => $link) {
                SupplierLink::create([
                    'supplier_id' => $supplier->id,
                    'type' => $type,
                    'url' => $link,
                ]);
            }
        }

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }


    public function edit(Supplier $supplier)
    {
        $types = SupplierType::select('id', 'title_ar as name_ar')->get();
        $cities = City::get(['id', 'name_ar']);
        $regions = Region::where('city_id', $supplier->city_id)->get(['id', 'name_ar']);
        $discounts = Discounts::select('id', 'title_ar as name_ar')->get();
        $last_order = Supplier::orderByDesc('sort_order')->first('sort_order');
        $supplier_links = [];
        foreach ($supplier->links as $link) {
            $supplier_links[$link->type] = $link->url;
        }

        return view('pages.apps.suppliers.create',
            compact('supplier', 'types', 'cities', 'regions',
                'discounts', 'last_order', 'supplier_links'));
    }

    public function update(SupplierCreateRequest $request, Supplier $supplier)
    {
        $data = $request->except('_token', 'supplier_links', 'logo_image');

        $folderName = Str::slug($request->name_en, '_');
        if ($request->hasFile('logo_image')) {
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            $fileNameToStore = uniqid('', false) . '.' . $extension;
            if ($supplier->getRawOriginal('logo_image'))
                Storage::disk('s3')->delete($supplier->getRawOriginal('logo_image'));
            $data['logo_image'] = Storage::disk('s3')
                ->putFileAs("Supplier/$folderName", $request->file('logo_image'), $fileNameToStore);
        }

        $supplier->update($data);

        if ($request->supplier_links) {
            SupplierLink::where('supplier_id', $supplier->id)->delete();
            foreach ($request->supplier_links as $type => $link) {
                SupplierLink::create([
                    'supplier_id' => $supplier->id,
                    'type' => $type,
                    'url' => $link,
                ]);
            }
        }

        return response()->json(['message' => 'Update Successfully', 'status' => 200]);
    }

    public function destroy(Supplier $supplier)
    {
        if ($supplier->getRawOriginal('logo_image'))
            Storage::disk('s3')->delete($supplier->getRawOriginal('logo_image'));

        $supplier->delete();
    }
}
