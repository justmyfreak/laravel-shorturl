<?php

class ShortenController extends BaseController {

	public function postShorten()
	{
		//get url input
		$url = Input::get('url');

		//validate url
		$val = Url::validate(array('url' => $url));

		//if error, return error message
		if ($val !== true) 
		{
			return 'error';
		}

		//check whether url is shortened or not
		$record = Url::whereUrl($url)->first();

		if ($record) 
		{
			return 'shortened already';
		}

		//create new short url
		$data = new Url;
		$data->url = $url;
		$data->given = Url::getShortenedUrl();

		//if successfully saved to db
		if($data->save())
		{
			$row = Url::whereUrl($url)->first();
			return $row->given;
		}

	}

}