<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale as SaleModel;

class Sale extends Component
{
    public $saleItems = [];
    public $customers = [];
    public $products = [];
    public $sale_at = "";
    public $customer_id = "";
    public $invoice_no = "";

    protected $rules = [
        'sale_at' => 'required',
        'customer' => 'required',
        'items.*.product_id' => 'required',
        'items.*.rate' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'items.*.manual_rate' => 'regex:/^\d+(\.\d{1,2})?$/',
        'items.*.qty' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    ];
    
    public function mount()
    {
        $this->customers = Customer::all();
        $this->products = Product::all();
        $this->saleItems = [
            ['product_id'=>'', 'rate'=>0.00, 'manual_rate'=>0.00, 'qty'=>1],
        ];
    }
    
    public function addRow()
    {
        $this->saleItems[] = ['product_id'=>'', 'rate'=>0.00, 'manual_rate'=>0.00, 'qty'=>1];
        $this->emit('row-added');
    }
    
    public function deleteRow($index)
    {
        unset($this->saleItems[$index]);
    }
    
    public function save($data)
    {
        $this->validate();
        dd($data);
    }

    public function render()
    {
        return view('livewire.sale');
    }
}
