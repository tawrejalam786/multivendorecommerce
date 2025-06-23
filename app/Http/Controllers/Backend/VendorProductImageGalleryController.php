<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTraits;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        /** Check Product Vendor. */
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }
        return $dataTable->render('vendor.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'image', 'max:2048']
        ]);

        //** Handle Multi Image upload */
        $imagePath = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePath as $path){
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Images Uploaded Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductImageGallery::findOrFail($id);

        /** Check Product Vendor. */
        if($productImage->product->vendor_id != Auth::user()->vendor->id)
        {
            abort(404);
        }
        $this->deleteImage($productImage->image);
        $productImage->delete();

        return response(['status' => 'success', 'message' => 'Image Deleted Successfully!']);
    }
}
