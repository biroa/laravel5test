<?php namespace App\Providers;

use App\Article;
use App\Tag;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        //We bind {articles} route variable automatically to
        //the App\Articles model so we do not have to use
        // $id in default resource controllers

        //$router->model('articles', 'App\Article');

        $router->bind('articles',function($id){

            return Article::published()->findOrFail($id);

        });


            $router->bind('tags',function($name){
                if(!is_numeric($name)){
                    return Tag::where('name','=',$name)->firstOrFail();
                }
            });




    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group([ 'namespace' => $this->namespace ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

}
