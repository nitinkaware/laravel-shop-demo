<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Variant::class, 'color_id', 'id')->select('id', 'color', 'price');
    }

    public function size()
    {
        return $this->belongsTo(Variant::class, 'size_id', 'id')->select('id', 'size');
    }
}
