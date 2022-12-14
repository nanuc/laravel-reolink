<?php

namespace Nanuc\LaravelReolink;

use Illuminate\Support\ServiceProvider;

class LaravelReolinkServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton('reolink-api', fn() => new LaravelReolinkFactory());
    }
}
