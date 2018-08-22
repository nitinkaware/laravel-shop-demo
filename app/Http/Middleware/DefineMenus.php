<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Lavary\Menu\Facade as Menu;

class DefineMenus {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('primary', function ($menu) {

            /** @var Collection $topLeavelCategories */
            $this->getTopLevelCategories()->each(function ($category) use ($menu) {

                $menu->add($category->name);

                $category->subCategories->each(function ($subCategory) use ($menu, $category) {
                    $menu->{camel_case($category->name)}->add(
                        $subCategory->name, route("category.products.index", $subCategory->slug)
                    );
                });
            });
        });

        return $next($request);
    }

    /**
     * @return Collection|static[]
     */
    private function getTopLevelCategories()
    {
        return cache()->rememberForever('menus:topLevelCategories', function () {
            return Category::with('subCategories')->whereHas('subCategories', function ($query) {
                $query->whereNotIn('category_id', function ($innerQuery) {
                    $innerQuery->select('sub_category_id')->from('sub_categories');
                });
            })->get();
        });
    }
}
