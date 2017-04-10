<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;

class MessagesController extends Controller {

	public function index()
	{
		$message = Message::get();	
		return \Response::json($message);
	}

}