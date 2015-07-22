<?php namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Http\Traits\ImageEditor;
use App\Http\Helpers\ImageHelper as ImageHelper;
use Intervention\Image\Facades\Image as Image;


class GalleriesController extends Controller
{
    use ImageEditor;
    protected $model;

    public function __construct(Gallery $gallery)
    {
        $this->middleware('auth');
        $this->model = $gallery;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = Gallery::getPaginated(1);

        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = Category::GetAllSelectable();

        return view('galleries.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(GalleryRequest $request, Gallery $gallery, ImageHelper $imageHelper, Image $image)
    {
        $imageName = $request->file('orig_thumbnail')->getClientOriginalName();
        $folderPath = $this->getOriginalThumbnailPath();
        $newPath = $folderPath . '/' . str_replace(' ','_', strtolower($imageName));
        $this->createFolderIfNotExists();

        $input = $request->all();
        $input['orig_thumbnail'] = $newPath;
        $file = $request->file('orig_thumbnail');
        $gallery->create($input);
        //Save file with the original size
        $img = $image::make($file);
        $img->save($newPath);
        flash()->success('Your Gallery has been created');
        $this->reprocessImage($gallery->getConfirmedPath());

        return redirect('galleries');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
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
