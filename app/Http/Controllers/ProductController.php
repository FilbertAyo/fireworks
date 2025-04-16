<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $search = $request->input('search');
        // Paginate the products with search functionality
        $products = Product::when($search, function ($query, $search) {
            return $query->where('product_name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        })
        ->paginate(10);  // Adjust the number of items per page (10 in this case)

        return view('products.product', compact('products', 'search', 'categories'));
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
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'product_description' => 'required|string',
            'duration' => 'required|integer',
            'quantity' => 'required|integer',
            'piece' => 'required|integer',
            'image_url' => 'required',
            'product_status' => 'required',
            'video_url' => 'required|string',
        ]);

        // Handle the image upload
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Unique filename
            $imagePath = 'product_images/' . $imageName;
            $image->move(public_path('product_images'), $imageName);
        }


        // Create the product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->product_description = $request->product_description;
        $product->duration = $request->duration;
        $product->quantity = $request->quantity;
        $product->piece = $request->piece;
        $product->image_url = $imagePath;
        $product->product_status = $request->product_status;
        $product->video_url = $request->video_url; // Admin-provided path


        // Save the product
        $product->save();

        // Return success response
        return redirect()->back()->with('success', 'product added successfully');
    }

    public function product_list(Request $request) {

        $search = $request->input('search');

        // Paginate the products with search functionality
        $products = Product::where('quantity','>',0)->when($search, function ($query, $search) {
            return $query->where('product_name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        })
        ->paginate(8);

        return view('products.product_list', compact('products','search'));
    }

    public function product_details($id) {

        $product = Product::findOrFail($id);

        return view('products.product_details', compact('product'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        return view('products.product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category' => 'required|string|max:255',
        'product_description' => 'required|string',
        'duration' => 'required|integer',
        'quantity' => 'required|integer',
        'piece' => 'required|integer',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // optional image upload
        'product_status' => 'required',
        'video_url' => 'required|string',
    ]);

    // Handle the image upload
    if ($request->hasFile('image_url')) {
        $image = $request->file('image_url');
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Unique filename
        $image->move(public_path('product_images'), $imageName);
        $data['image_url'] = 'product_images/' . $imageName;
    }

    // Update product with validated data
    $product->update($data);

    return redirect()->back()->with('success', 'Product updated successfully');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::findOrFail($product);

        // Delete the image file if it exists
        if ($product->image_url && file_exists(public_path($product->image_url))) {
            unlink(public_path($product->image_url));
        }

        $imagePath = public_path($product->image_url);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }


        // Delete the product record from the database
        $product->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }


    public function category(){
        $categories = Category::all();
        return view('settings.category',compact('categories'));
    }

    public function storeCategory(){
        $category = new Category();
        $category->category_name = request('category_name');
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');
    }
    public function destroyCategory($category)
    {
        $category = Category::findOrFail($category);

        // Delete the category record from the database
        $category->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

}
