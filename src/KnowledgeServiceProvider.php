<?php

namespace ZFTInfo\Knowledge;

use Illuminate\Support\ServiceProvider;

class KnowledgeServiceProvider extends ServiceProvider
{
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
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/zftinfo/knowledge')],
                'knowledge'
            );
        }

        $this->app->booted(function () {
            Knowledge::routes(__DIR__.'/../routes/web.php');
        });
    }
}