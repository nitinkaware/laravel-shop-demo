<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatistic extends Model {

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
