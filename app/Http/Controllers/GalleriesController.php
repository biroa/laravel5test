<?php namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\Http\Requests\GalleryRequest;
use Intervention\Image\ImageManager;

class GalleriesController extends Controller
{


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
    public function store(GalleryRequest $request, Gallery $gallery)
    {
        //Todo:: Refactor ...
        //Todo:: resize image, get the stored record_id, save based on the id
        $imageName = $request->file('thumbnail')->getClientOriginalName();
        $folderPath = 'img/gallery_thumbnails';
        //Todo:: We have to move folder creation to separated method
        $newPath = $folderPath . '/' . $imageName;
        if ( !file_exists($folderPath) ) {
            if ( !mkdir($folderPath, 0777, true) ) {
                die('Failed to create folders...');
            }
        }

        $input = $request->all();
        $input['thumbnail'] = $newPath;
        $file = $request->file('thumbnail');
        $gallery->create($input);

        $manager = new ImageManager([ 'driver' => 'imagick' ]);
        //Todo::move gallery thumbnail img size to separated config
        $manager->make($file)->resize(300, 200)->save($newPath);

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
