<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productGroups = ProductGroup::with('tax')->latest()->paginate(10);
        return view('product_groups.index', compact('productGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxes = Tax::cursor();
        return view('product_groups.create', compact('taxes'));
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
            'name'=> 'required|unique:product_groups',
            'tax_id'=>'required'
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        ProductGroup::create($request->all());
        return redirect('/product_groups')->with('success', 'Product Group Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGroup $productGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGroup $productGroup)
    {
        $taxes = Tax::cursor();
        return view('product_groups.edit', compact('taxes', 'productGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGroup $productGroup)
    {
        $request->validate([
            'name'=> [
                'required',
                Rule::unique('product_groups')->ignore($productGroup)
            ],
            'tax_id'=>'required'
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        $productGroup->update($request->all());
        return redirect('/product_groups')->with('success', 'Product Group Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGroup  $productGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGroup $productGroup)
    {
        $productGroup->delete();
        return redirect('/product_groups')->with('notice', 'Product Group Record Deleted!');
    }
}
