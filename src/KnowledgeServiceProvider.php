<?php

namespace ZFTInfo\Knowledge;

use Illuminate\Support\ServiceProvider;

use ZFTInfo\Knowledge\Commands\InstallCommand;

class KnowledgeServiceProvider extends ServiceProvider
{
    protected $commands = [
        InstallCommand::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function boot(Knowledge $extension)
    {
        if (! Knowledge::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'knowledge');

            $this->publishes([
            __DIR__ . '/../config/knowledge.php' => config_path('knowledge.php'),
        ]);
        }

        if ($migrations = $extension->migrations()) {
            $this->loadMigrationsFrom($migrations);
        }

        // if ($this->app->runningInConsole() && $assets = $extension->assets()) {
        //     $this->publishes(
        //         [$assets => public_path('vendor/zftinfo/knowledge')],
        //         'knowledge'
        //     );
        // }

        $this->app->booted(function () {
            Knowledge::routes(__DIR__.'/../routes/web.php');
        });
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}