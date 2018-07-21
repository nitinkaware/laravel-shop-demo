<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class WishList extends Pivot {

    protected $table = 'wish_lists';

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public $timestamps = false;

    public function scopeFilterByUser($query, $userId)
    {
        $query->where('user_id', $userId);
    }
}
