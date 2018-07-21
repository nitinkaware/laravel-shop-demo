<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public function parentCategory()
    {
        return $this->belongsToMany(Category::class, 'sub_categories', 'sub_category_id', 'category_id');
    }

    public function subCategories()
    {
        return $this->belongsToMany(Category::class, 'sub_categories', 'category_id', 'sub_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeFilterByParentCategory($query, $slug)
    {
        $query->whereHas('parentCategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
    }
}
