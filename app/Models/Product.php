<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = [];

    public function getImageAttribute($value)
    {
        if ($value != null) :
            return asset('storage/products/' . $value);
        else :
            return'https://fakeimg.pl/308x205/?text=Product&font=lexend';
        endif;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
