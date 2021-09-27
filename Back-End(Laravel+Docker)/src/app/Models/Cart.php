<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity' => 'integer',];

    public function product()
    {
        return $this->belongsTo(Products::class,'id_product','id');
    }
}
