<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('hello');
	}
	public function profile()
	{
		return View::make('profile');
	}
		public function home()
	{
		return View::make('home');
	}

	public function form()
	{
		return View::make('form');
	}

	public function post_form()
	{
        $nama = Input::get('nama');
        $jeniskelamin = Input::get('jeniskelamin');
        $alamat = Input::get('alamat');
 
        return 'Nama : '.$nama.'<br/> Jenis Kelamin : '.$jeniskelamin.'<br/> Alamat '.$alamat;
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

//LOGIN
	public function login()
    {
        return View::make('login');
    }
 
    public function doLogin()
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:5'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $userdata = array(
            'email'   => Input::get('email'),
            'password'          => Input::get('password')
            );
        	if (Auth::attempt($userdata)) {
           		return Redirect::to('/');
        	} else {               
            	return Redirect::to('login');
        	}
        }
    }
 
    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }


}
