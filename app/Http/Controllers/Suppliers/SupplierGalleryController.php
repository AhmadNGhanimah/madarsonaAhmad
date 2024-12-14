<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\SupplierGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SupplierGalleryController extends Controller
{
    public function index($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        $galleries = $supplier->gallery;

        return view('pages.apps.suppliers.galleries.index', compact('supplier', 'galleries'));
    }

    public function store(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        $folderName = Str::slug($supplier->slug_en, '_');
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = uniqid('', false) . '.' . $extension;
                $path = Storage::disk('s3')->putFileAs("Supplier/$folderName/Gallery", $image, $fileNameToStore);
                SupplierGallery::create([
                    'supplier_id' => $supplier->id,
                    'path' => $path,
                ]);
            }
        }

        return response()->json(['message' => 'Added Successfully', 'status' => 200]);
    }

    public function remove($id)
    {
        $supplierGallery = SupplierGallery::find($id);
        if ($supplierGallery->path && Storage::disk('s3')->exists($supplierGallery->getRawOriginal('path')))
            Storage::disk('s3')->delete($supplierGallery->getRawOriginal('path'));

        $supplierGallery->delete();
    }

}
