<?php

namespace Modules\Blog\Providers;

use App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class BlogServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Blog';

    public function boot(): void
    {
        $this->loadMigrations();
        Route::middleware('web')->group(module_path('Blog', 'routes/web.php'));
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blog');
        Livewire::component('blog-component', \Modules\Blog\Livewire\BlogComponent::class);
    }

    private function loadMigrations(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Migrations'));
    }
}
