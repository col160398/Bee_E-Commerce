<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','id_categories','image','description','unit_price','promotion_price','quantity','view'];

    public function categories()
    {
        return $this->belongsTo(Categories::class,'id_categories','id');
    }
}
