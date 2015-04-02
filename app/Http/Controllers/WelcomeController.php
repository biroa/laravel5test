<?php namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Carbon\Carbon;
use App\Article;

class WelcomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::getAll();
        return view('public.index', compact('articles'));

    }

    /**
     * Get Articles by url based on getOneByName
     * function
     *
     * @param $text
     */
    public function show($text)
    {
        $article = Article::getOneByName($text);
        //Todo::create the specific template
        dd($article);
    }

}
