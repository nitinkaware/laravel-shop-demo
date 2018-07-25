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

    public function wishListedUsers()
    {
        return $this->belongsToMany(User::class, 'wish_lists', 'product_id', 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class);
    }

    public function statistics()
    {
        return $this->hasOne(ProductStatistic::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function scopeAuthUserCart()
    {
        $this->whereHas('carts', function ($query) {
            $query->where('user_id', auth()->id());
        });
    }

    public function isWishListed($user)
    {
        $userId = $user instanceof User ? $user->getKey() : $user;

        return $this->wishlists()
            ->where('user_id', $userId)
            ->whereNotNull('user_id')
            ->exists();
    }
}
