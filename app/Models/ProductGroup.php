<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
