<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name'=> 'required|unique:customers',
            'contact_number'=> 'required',
            'email'=> 'nullable|email|unique:customers'
        ]);

        $request->merge([
            'active' => $request->input('active', 0)
        ]);
        Customer::create($request->all());
        return redirect('/customers')->with('success', 'Customer Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'=> [
                'required',
                Rule::unique('customers')->ignore($customer)
            ],
            'contact_number'=> 'required',
            'email'=> [
                'nullable',
                'email',
                Rule::unique('customers')->ignore($customer)
            ]
        ]);

        $request->merge([
            'active' => $request->input('active', 0)
        ]);

        $customer->update($request->all());
        return redirect('/customers')->with('success', 'Customer Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers')->with('notice', 'Customer Record Deleted!');
    }
}
