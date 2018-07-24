<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model {

    protected $fillable = [
        'color',
        'size',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
