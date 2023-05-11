<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();

        return Inertia::render('Public/Index', [
            "products" =>  $product,
            "category" =>  $category
        ]);
    }
}
