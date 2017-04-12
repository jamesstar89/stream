<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagsSearchController extends Controller {

	public function index(Request $request)
	{   
		$Query = $request->q;
		$Tag = Tag::where('name','like','%'.$Query.'%')
			->orderBy('id','DESC')
			->take(5)
			->with('posts')
			->get(array('id', 'name', 'user_id'))
			->toArray();
        return \Response::json(array(
        	"tags" =>	$Tag	
        	), 200);
	}

}