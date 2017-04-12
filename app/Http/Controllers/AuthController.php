<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // load the view and pass the photos
        return view('auth.login');
	}

	// login
	public function login(Request $request)
	{
		// get user
	    $user = array('username' => $request->input('username'), 
	    			  'password' => $request->input('password'));
	    // check user auth
	    if (Auth::attempt($user)) {
	        return redirect('stream');
	    }    
	    return redirect('stream');
	}

	public function logout()
	{
    	Auth::logout();
    	return redirect('stream');
	}

}