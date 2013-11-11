<?php

class Url extends Eloquent {

	protected $table = 'urls';

	public static $rules = array(
        'url' => 'required|url'
    );

    public static function validate($input)
    {
        $v = Validator::make($input, static::$rules);
        return $v->fails()
                ? $v
                : true;
    }

    public static function getShortenedUrl()
    {
        $shortened = base_convert(rand(10000,99999), 10, 36);
        if ( static::whereGiven($shortened)->first() ) {
                return static::getShortenedUrl();
        }

        return $shortened;
    }

}