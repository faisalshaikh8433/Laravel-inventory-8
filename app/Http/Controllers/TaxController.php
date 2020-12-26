<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::latest()->paginate(10);
        return view('taxes.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxes.create');
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
            'gst_percent'=> 'required|regex:/^\d+(\.\d{1,2})?$/|max:6',
            'hsncode'=> ['required',
                Rule::unique('taxes')->where(function ($query) {
                    return $query->where('gst_percent', request('gst_percent'));
                })
                // unique:taxes,hsncode,NULL,id,gst_percent,'. request('gst_percent'),
            ],
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        Tax::create($request->all());
        return redirect('/taxes')->with('success', 'Tax Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        return view('taxes.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $request->validate([
            'gst_percent'=> 'required|regex:/^\d+(\.\d{1,2})?$/|max:6',
            'hsncode'=> ['required',
                Rule::unique('taxes')->where(function ($query) {
                    return $query->where('gst_percent', request('gst_percent'));
                })->ignore($tax)
                // unique:taxes,hsncode,NULL,id,gst_percent,'. request('gst_percent'),
            ],
        ]);
        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        $tax->update($request->all());
        return redirect('/taxes')->with('success', 'Tax Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        if ($tax->productGroups()->exists()) {
            return redirect('/taxes')->with('notice', 'Cannot delete this record it is used in Product Groups');
        }
        $tax->delete();
        return redirect('/taxes')->with('notice', 'Tax Record Deleted!');
    }
}
