<?php namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
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
        $tags = Tag::getAll();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $id = $request->segment(2);
        $tags = Tag::getOneById($id);
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
