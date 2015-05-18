<?php namespace App\Http\Controllers;

use App\Country as Country;
use App\Userprofile;
use Illuminate\Http\Request;

class UserprofilesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = Userprofile::GetPaginated(5);

        return view('userprofiles.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::lists('nicename', 'id');

        return view('userprofiles.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Userprofile $userprofile)
    {
        $userprofile->create($request->except('id'));
        //We use the laracasts service providers
        flash()->success('Your article has been created');

        return redirect('userprofiles');
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
        //show
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
        $userprofile = Userprofile::getOneById($id);
        $countries = Country::lists('nicename', 'id');

        return view('userprofiles.edit', compact('userprofile', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $userprofile = Userprofile::getOneById($id);
        $userprofile->update($request->except('id', 'created_at'));

        return redirect('userprofiles');
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
