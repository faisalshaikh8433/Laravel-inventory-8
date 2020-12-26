<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }
    
    public function saleItem()
    {
        $this->belongsTo(SaleItem::class);
    }
}
