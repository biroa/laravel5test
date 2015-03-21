<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Everything what is here will execute after register method
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose the menu bar
     */
    public function composeNavigation()
    {
        // If we would like to calculate or give beck something complex than it is not
        //providers related task we can specify a class path with method instead closures like so:
        //view()->composer('articles.partials._menu', 'App\HTTP\Composer\NavigationComposer@handle');

        //provider with closure
        view()->composer('articles.partials._menu', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }

}
