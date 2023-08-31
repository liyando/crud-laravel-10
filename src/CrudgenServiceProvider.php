<?php

namespace liyando/Crudgenlaravel;

use Illuminate\Support\ServiceProvider;
use liyando/Crudgenlaravel\Console\MakeApiCrud;
use liyando/Crudgenlaravel\Console\MakeCommentable;
use liyando/Crudgenlaravel\Console\MakeCrud;
use liyando/Crudgenlaravel\Console\MakeService;
use liyando/Crudgenlaravel\Console\MakeViews;
use liyando/Crudgenlaravel\Console\RemoveApiCrud;
use liyando/Crudgenlaravel\Console\RemoveCommentable;
use liyando/Crudgenlaravel\Console\RemoveCrud;
use liyando/Crudgenlaravel\Console\RemoveService;

class CrudgenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //publish config file
        $this->publishes([__DIR__.'/../config/crudgen.php' => config_path('crudgen.php')]);

        //default-theme
        $this->publishes([__DIR__.'/stubs/default-theme/' => resource_path('crudgen/views/default-theme/')]);

        //default-layout
        $this->publishes([__DIR__.'/stubs/default-layout.stub' => resource_path('views/default.blade.php')]);

        //and commentable stub
        $this->publishes([
            __DIR__.'/stubs/commentable/views/comment-block.stub' => resource_path('crudgen/commentable/comment-block.stub')
        ], 'commentable-stub');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crudgen.php', 'crudgen');

        $this->commands(
            MakeCrud::class,
            MakeViews::class,
            RemoveCrud::class,
            MakeApiCrud::class,
            RemoveApiCrud::class,
            MakeCommentable::class,
            RemoveCommentable::class,
            MakeService::class,
            RemoveService::class
        );
    }
}
