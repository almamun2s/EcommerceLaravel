<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'price' => 'required',
            'disc_price' => 'required',
        ]);

        $fileName = null;
        if ($request->file('image')) {
            $file = $request->file('image');

            // Renaming the file
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'));
            }
            // Uploading the file to upload directory
            $file->move('uploads/products', $fileName);
        }


        Product::create([
            'name' => $request->name,
            'category_id' => (int) $request->category,
            'price' => (float) $request->price,
            'discount_price' => (float) $request->disc_price,
            'description' => $request->description,
            'image' => $fileName,

        ]);


        toastr()->success('Product created Successfully.');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.product.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'price' => 'required',
            'disc_price' => 'required',
        ]);

        $fileName = null;
        if ($request->file('image')) {
            $file = $request->file('image');

            // Renaming the file
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'));
            }
            // Uploading the file to upload directory
            $file->move('uploads/products', $fileName);

            $product->image = $fileName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = (int) $request->category;
        $product->price = (float) $request->price;
        $product->discount_price = (float) $request->disc_price;

        $product->save();

        toastr()->success('Product Updated Successfully.');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (($product->image != null) && (file_exists(public_path('uploads/products/' . $product->image)))) {
            unlink(public_path('uploads/products/' . $product->image));
        }
        $product->delete();

        toastr()->info('Product Deleted.');
        return redirect()->route('admin.product.index');
    }
}
