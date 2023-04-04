<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::query()
        ->when(RequestFacade::input('search'), function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->select('id','category_id','supplier_id' ,'name','image','unit','stock')
        ->paginate(10)->withQueryString();

        $products->map(function ($product) {
            $product->image_url = asset('storage/' . $product->image);
            $product->category_name = $product->category->name;
            $product->supplier_name = $product->supplier->name;
            return $product;
        });

        return Inertia::render('Stock/Stock',[
            "products" => $products,
            'filters' => RequestFacade::only(['search']),
        ]);
    }

    public function create($id)
    {
        $product = Product::select('id','stock')->where('id',$id)->get();

        return Inertia::modal('Stock/AddStock',[
            'product' => $product
        ])->baseRoute('stock.index');

    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->stock = is_null($request->input('stock')) ? 0 : $request->input('stock');
        

        $product->save();

        
        

        return redirect()
            ->route("stock.index")
            ->with("message", "Stock successfully added");
    }
}
