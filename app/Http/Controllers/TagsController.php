<?php namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    /*
     * set authentication for all method of this TagsController
     */
    public function  __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::getPaginated(2);

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Tag $tag, Request $request)
    {
        $tag->create($request->only('name'));
        //We use the Laracasts service providers
        flash()->success('Your article has been created');

        return redirect('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Tag $tag
     *
     * @return \App\Http\Controllers\Response
     * @internal param int $id
     *
     */
    public function show(Tag $tag)
    {

        $articles = $tag->articles()->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Get data by tag
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tag                 $tag
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, Tag $tag)
    {

        $tagName = $request->segment(2);
        $tags = Tag::getOneByTag($tagName);

        return view('tags.edit', compact('tags'));


    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->segment(2);
        $tags = Tag::getOneById($id);
        $tags->update($request->only('name'));

        return redirect('tags');
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
