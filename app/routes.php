<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('shorturl.home');
});

Route::post('shorten', array('as' => 'shorten', 'uses' => 'ShortenController@postShorten', 'before' => 'csrf'));

Route::get('{shorten}', function($given)
{
    // query the DB for the row with that short url
    $row = Url::whereGiven($given)->first();

    // if not found, redirect to home page
    if ( is_null($row) ) return Redirect::to('/');

    // Otherwise, fetch the URL, and redirect.
    return Redirect::to($row->url);
});