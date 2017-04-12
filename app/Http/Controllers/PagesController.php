<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

	public function pricing()
	{
        return view('pages.pricing');
	}

	public function funding()
	{
        return view('pages.funding');
	}

}