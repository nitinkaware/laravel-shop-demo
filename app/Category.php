<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public function subCategories()
    {
        return $this->belongsToMany(Category::class, 'sub_categories', 'category_id', 'sub_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
