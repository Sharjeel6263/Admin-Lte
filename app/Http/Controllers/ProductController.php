<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware(['permission:product-create'], ["only" => ["create", "store"]]);
        $this->middleware(['permission:product-list'], ["only" => ["index", "show"]]);
        $this->middleware(['permission:product-edit'], ["only" => ["edit", "update"]]);
        $this->middleware(['permission:product-delete'], ["only" => ["destroy"]]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"=> "required",
            ]);
            $product = Product::create([
                "name"=> $request->name,
                ]);
                return redirect()->route("products.index")->with("success","Product Stored Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view("products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->save();
        return redirect()->route("products.index")->with("success","Product updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("products.index")->with("success", "Product Deleted");
    }
}
