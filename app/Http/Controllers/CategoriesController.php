<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * set authentication for all method of this CategoriesController
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
        //
        $categories = Category::getAll();

        return view('categories.index', compact('categories'));
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
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = Category::getOneById($id);

        return $category;
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::getOneById($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\CategoryRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CategoryRequest $request)
    {
        $category = Category::getOneById($id);
        //Todo:: This is a temp way ... There has to be a better one.
        $category->update($request->only('name','short_lead','lead','body','description'));
        return redirect('categories');
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
