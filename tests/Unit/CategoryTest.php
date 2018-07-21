<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function it_knows_about_its_parent_category()
    {
        $parentCategory = factory(Category::class)->create();
        $childCategories = factory(Category::class, 2)->create();

        $parentCategory->subCategories()->attach($childCategories);

        $childCategories->each(function ($childCategoryCategory) use ($parentCategory) {
            $this->assertTrue($parentCategory->is($childCategoryCategory->parentCategory()->first()));
        });
    }
}
