<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()
        ->when(RequestFacade::input('search'), function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->select('id', 'name','image')
        ->paginate(10)->withQueryString();

        
            $categories->getCollection()->transform(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image' => asset('storage/' . $category->image),
                ];
            });

            $categories = $categories->toArray();
        return Inertia::render('Categories/ListCategory',['categories' => $categories, 'filters' => RequestFacade::only(['search'])]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::modal('Categories/CreateCategory')->baseRoute('categories/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $validation = Validator::make($request->all(),[
            "name" => "required | max:255",
            "image" => "file | max:1024"
        ]);

        $categories = new Category();
        $categories->name = $request->input('name');

        if ($request->file("image")) {
            $file = $request->file("image")->store("category_images", "public");
            $categories->image = $file;
        }

        $categories->save();
        

        return redirect('/categories/')->with('message','Categories Successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
