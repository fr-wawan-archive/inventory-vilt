<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        
        $categories = Category::all()->map(function($category){
            return [
                'name' => $category->name
            ];
        })->count();

        $suppliers = Supplier::all()->map(function($supplier){
            return [
                'name' => $supplier->name
            ];
        })->count();
        $products = Product::all()->map(function($product){
            return [
                'name' => $product->name
            ];
        })->count();

        
        return Inertia::render("Dashboard/Dashboard",[
            "categories" => $categories,
            "suppliers" => $suppliers,
            "products" => $products
        ]);
    }

}
