<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Pagination\LengthAwarePaginator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $suppliers = Supplier::query()
        ->when(RequestFacade::input('search'), function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->select('id', 'name','phone','address')
        ->paginate(10)->withQueryString();


        return Inertia::render('Suppliers/ListSupplier',[
            "suppliers" => $suppliers,
            'filters' => RequestFacade::only(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required | max:255',
            'address' => 'required | max:255', 
            'phone' => 'required'
        ]);

        Supplier::create($validateData);


      return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return Inertia::modal('Suppliers/EditSupplier',[
            "supplier" => $supplier
        ])->baseRoute('suppliers.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // dd($request->all());
        $rules = [
            "name" => "required | max:255",
            "address" => "required | max:255",
            "phone" => "required",
        ];

        $validatedData = $request->validate($rules);

        Supplier::where("id", $supplier->id)->update($validatedData);

        // return redirect("/suppliers/")->with(
        //     "status",
        //     "Supplier Successfully Updated"
        // );

        return redirect("/suppliers/")->with('message','Supplier Successfully added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect("/suppliers/")->with(
            "status",
            "Supplier Successfully Deleted"
        );
    }
}
