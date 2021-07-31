<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tax;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['tax', 'productGroup'])->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productGroups = ProductGroup::cursor();
        $taxes = Tax::cursor();
        return view('products.create', compact('taxes', 'productGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:products',
            'product_group_id'=>'required',
            'tax_id'=>'required',
            'rate'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cost'=> 'regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        Product::create($request->all());
        return redirect('/products')->with('success', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $taxes = Tax::cursor();
        $productGroups = ProductGroup::cursor();
        return view('products.edit', compact('taxes', 'productGroups', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=> [
                'required',
                Rule::unique('products')->ignore($product)
            ],
            'product_group_id'=>'required',
            'tax_id'=>'required',
            'rate'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cost'=> 'regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        Product::create($request->all());
        return redirect('/products')->with('success', 'Product Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
