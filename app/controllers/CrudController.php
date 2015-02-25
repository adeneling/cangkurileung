<?php

class CrudController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profiles = DB::table('profiles')->paginate(5);
        $profiles =
        [
            'profiles' => $profiles
        ];
        return View::make('crud', $profiles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('crud/create');
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
            return Redirect::to('crud/create')->withErrors($validator)->withInput();
      } else {               
      DB::table('profiles')->insert(
      array(
                  'nama' => Input::get('nama'),
                  'jeniskelamin' => Input::get('jeniskelamin'),
                  'alamat' => Input::get('alamat')
            )
      );
    	//Session::flash('message', array('class' => 'alert alert-success', 'Data Berhasil Ditambahkan'));

      Session::flash('message', 'Data Berhasil Ditambahkan');
      //Session::flash('flash_type', 'alert alert-success');
      return Redirect::to('crud');
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
		$profilesbyid = DB::table('profiles')->where('id',$id)->first();
      	$profilesbyid =
      	[
          'profilesbyid' => $profilesbyid
    	];
  		return View::make('crud.edit', $profilesbyid);
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
            echo "string";
            return Redirect::to('crud/edit/'.$id)->withErrors($validator)->withInput();
      } else {
      DB::table('profiles')
      ->where('id', $id)
      ->update(array(
                  'nama' => Input::get('nama'),
                  'jeniskelamin' => Input::get('jeniskelamin'),
                  'alamat' => Input::get('alamat')
            ));
 
      Session::flash('message', 'Data Berhasil Diubah');
      return Redirect::to('crud');
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
		DB::table('profiles')->where('id', '=', $id)->delete();
      	Session::flash('message', 'Data Berhasil Dihapus');
      	return Redirect::to('crud');
	}


}
