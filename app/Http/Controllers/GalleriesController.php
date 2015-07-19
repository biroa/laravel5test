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

    public function __construct()
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
        //Todo:: resize image, get the stored record_id, save based on the id
        $imageName = $request->file('orig_thumbnail')->getClientOriginalName();
        //Todo:: common check for the environment variables
        $folderPath = $this->getOriginalThumbnailPath();
        $newPath = $folderPath . '/' . $imageName;
        $this->createFolderIfNotExists();

        $input = $request->all();
        $input['orig_thumbnail'] = $newPath;
        $file = $request->file('orig_thumbnail');
        //::Todo:: We have to save the original image
       // dd($imageName,$newPath);
        $gallery->create($input);
        $img = $image::make($file);
        $img->save($newPath);
        flash()->success('Your Gallery has been created');

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
