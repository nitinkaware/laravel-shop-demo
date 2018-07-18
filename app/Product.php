<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function statistics()
    {
        return $this->hasOne(ProductStatistic::class);
    }
}
