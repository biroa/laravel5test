<?php namespace App\Http\Controllers;

use App\Http\Requests;
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
    public function edit(Tag $tag)
    {
        // We are going to handle the request
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
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
