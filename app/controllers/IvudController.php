<?php

class IvudController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profiles = Profile::paginate(5);
        $profiles =
        [
            'profiles' => $profiles
    ];
	return View::make('ivud.index', $profiles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ivud.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
                'nama' => 'required',
                'jeniskelamin' => 'required',
        );
 
        $validator = Validator::make(Input::all(), $rules);
 
        if ($validator->fails()) {     
                return Redirect::to('ivud/create')->withErrors($validator)->withInput();
        } else {                       
                $profile = new Profile;
        $profile->nama = Input::get('nama');
        $profile->jeniskelamin = Input::get('jeniskelamin');
        $profile->alamat = Input::get('alamat');
        $profile->save();
 
		Session::flash('message', 'Data Berhasil Ditambahkan');
        return Redirect::to('ivud');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profilesbyid = Profile::findOrFail($id);
	    $profilesbyid =
	    [
	        'profilesbyid' => $profilesbyid
	    ];
	    return View::make('ivud.edit', $profilesbyid);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
	        'nama' => 'required',
	        'jeniskelamin' => 'required',
	    );
	 
	    $validator = Validator::make(Input::all(), $rules);
	 
	    if ($validator->fails()) { 
	        return Redirect::to('ivud/'.$id.'/edit')->withErrors($validator)->withInput();
	    } else {
	        $profile = Profile::findOrFail($id);
	        $profile->nama = Input::get('nama');
	        $profile->jeniskelamin = Input::get('jeniskelamin');
	        $profile->alamat = Input::get('alamat');
	        $profile->save();
	 
	    Session::flash('message', 'Data Berhasil Diubah');
	    return Redirect::to('ivud');
	    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$profile = Profile::findOrFail($id);
	    $profile->delete();
	    Session::flash('message', 'Data Berhasil Dihapus');
	    return Redirect::to('crud');
	}


}
