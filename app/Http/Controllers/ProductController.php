<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()
        ->when(RequestFacade::input('search'), function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->select('id','category_id','supplier_id' ,'name','image','unit')
        ->paginate(10)->withQueryString();

        $products->map(function ($product) {
            $product->image_url = asset('storage/' . $product->image);
            $product->category_name = $product->category->name;
            $product->supplier_name = $product->supplier->name;
            return $product;
        });

        return Inertia::render('Products/ListProduct',[
            "products" => $products,
            'filters' => RequestFacade::only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all()->map(function($category){
            return [
                'id' => $category->id,
                'name' => $category->name
            ];
        });

        $suppliers = Supplier::all()->map(function($supplier){
            return [
                'id' => $supplier->id,
                'name' => $supplier->name
            ];
        });
        
        return Inertia::render('Products/CreateProduct',[
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                "name" => "required | max:255",
                "unit" => "required",
                "supplier_id" => "required",
                "category_id" => "required",
                "description" => "required",
                "image" => "required | file | max:1024",
            ]
        );


        if ($request->file("image")) {
            $validateData["image"] = $request->file("image")->store("product_images", "public");
        }

        Product::create($validateData);

        return redirect("/products/")->with("message","Product Successfully added");
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
    public function edit($id)
    {
        
        $categories = Category::all()->map(function($category){
            return [
                'id' => $category->id,
                'name' => $category->name
            ];
        });

        $suppliers = Supplier::all()->map(function($supplier){
            return [
                'id' => $supplier->id,
                'name' => $supplier->name
            ];
        });


        $product = Product::select('id','name','unit','description','category_id','supplier_id')->where('id',$id)->get();

        return Inertia::render('Products/EditProduct',[
            'categories' => $categories,
            'suppliers' => $suppliers,
            'product' =>  $product

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            "name" => "required | max:255",
            "unit" => "required",
            "supplier_id" => "required",
            "category_id" => "required",
            "description" => "required",
        ];

        $validatedData = $request->validate($rules);

        if ($request->file("image")) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $validatedData["image"] = $request->file("image")->store("product_images", "public");
        }
        
        Product::where("id", $product->id)->update($validatedData);

        return redirect()
            ->route("products.index")
            ->with("message", "Product succesfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete("public/" . $product->image);
        }

        Product::destroy($product->id);

        return redirect()
            ->route("products.index")
            ->with("message", "Category successfully deleted");
    }
}
