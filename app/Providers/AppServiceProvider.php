<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('diffInDetail', function (Carbon $dateTime) {
            return $this->diff($dateTime)->format('%y years, %m months and %d days');
        });

        \Illuminate\Database\Query\Builder::macro('toRawSql', function () {
            $bindings = array_map(function ($binding) {
                return is_int($binding) || is_float($binding) ? $binding : "'{$binding}'";
            }, $this->getBindings());

            return vsprintf(str_replace('?', "%s", $this->toSql()), $bindings);
        });

        \Illuminate\Database\Eloquent\Builder::macro('toRawSql', function () {
            $bindings = array_map(function ($binding) {
                return is_int($binding) || is_float($binding) ? $binding : "'{$binding}'";
            }, $this->getBindings());

            return vsprintf(str_replace('?', "%s", $this->toSql()), $bindings);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
