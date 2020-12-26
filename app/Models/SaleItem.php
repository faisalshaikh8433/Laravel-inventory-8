<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
