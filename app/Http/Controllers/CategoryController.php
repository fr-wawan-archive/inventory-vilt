<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Support\Facades\Storage;

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

        $categories->map(function ($category) {
            $category->image_url = asset('storage/' . $category->image);
            return $category;
        });


        return Inertia::render('Categories/ListCategory',['categories' => $categories, 'filters' => RequestFacade::only(['search'])]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::modal('Categories/CreateCategory')->baseRoute('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validateData = $request->validate([
            "name" => "required | max:255",
            "image" => "required | image | max:1024",
        ]);

         $validateData["image"] = $request->file("image")->store("category_images", "public");

        Category::create($validateData);

        return redirect("/categories/")->with(
            "message",
            "Categories Successfully added"
        );

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
        return Inertia::modal('Categories/EditCategory',[
            "category" => $category
        ])->baseRoute('categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {


        $rules = [
            "name" => "required | max:255",
        ];

        $validatedData = $request->validate($rules);

        if ($request->file("image")) {
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }
            $validatedData["image"] = $request->file("image")->store("category_images", "public");
        }
        
        Category::where("id", $category->id)->update($validatedData);

        return redirect()
            ->route("categories.index")
            ->with("message", "Category succesfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete("public/" . $category->image);
        }

        Category::destroy($category->id);

        return redirect()
            ->route("categories.index")
            ->with("message", "Category successfully deleted");
    }
}
