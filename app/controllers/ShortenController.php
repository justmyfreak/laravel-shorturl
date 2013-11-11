<?php

class ShortenController extends BaseController {

	public function postShorten()
	{
		//get url input
		$url = Input::get('url');

		//validate url
		$val = Url::validate(array('url' => $url));

		//if error, return with error message
		if ($val !== true) 
		{
			return Redirect::to('/')->withErrors($val);
		}

		//check whether url is shortened or not
		$record = Url::whereUrl($url)->first();

		if ($record) 
		{
			$url = url('/'.$record->given, $parameters = array(), $secure = null);
			return View::make('shorturl.result')->with('url',$url);
		}

		//create new short url
		$data = new Url;
		$data->url = $url;
		$data->given = Url::getShortenedUrl();

		//if successfully saved to db
		if($data->save())
		{
			$row = Url::whereUrl($url)->first();
			$url = url('/'.$row->given, $parameters = array(), $secure = null);
			return View::make('shorturl.result')->with('url',$url);
		}

	}

}