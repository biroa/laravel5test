<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    /*
     * only || except
     *
     * ['index'=>'index']
     *
     */

    public function  __construct()
    {
        $this->middleware('auth', [ 'except' => 'index' ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //$articles = Article::all();
        //get data based on order by desc
//        return \Auth::user();
        $now = Carbon::now()->toDateTimeString();
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Second argument to get the value as a key too eg:
        // "multiselect  array id" => "name|id [of the record]"
        $tags = \App\Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {

        //$article = new Article($request->all());//Mass assignment based solution
        $article = \Auth::user()->articles()->create($request->all());
        $article->tag()->attach($request->input('tag_list'));

        //We use the laracasts service providers
        flash()->success('Your article has been created');

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */

    //We use model binding in Route Service Provider
    //we do not need parameters anymore

    //public function show($id)

    public function show(Article $article)
    {
        //
        //$article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */

    //We use model binding in Route Service Provider
    //we do not need parameters anymore

    //public function edit($id)

    public function edit(Article $article)
    {
        //$article = Article::findOrFail($id);
        $tags = \App\Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    private function syncTag(Article $article, array $tags){
        $article->tag()->sync($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */

    //method injection

    //We use model binding in Route Service Provider
    //we do not need parameters anymore

    //public function update($id, ArticleRequest $request)

    public function update(Article $article, ArticleRequest $request)
    {
        //$article = Article::findOrFail($id);

        $article->update($request->all());
        //sync force article model to be only associated
        //with this tag list during the update

        //use attach,detach,sync on pivot table
        //$article->tag()->sync($request->input('tag_list'));
        $this->syncTag($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
