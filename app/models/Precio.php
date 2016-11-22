<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Precio extends Eloquent {

		protected $table = 'precios';

		protected $fillable = ['precio'];


	public static $errors;

	public static function isValid($data, $rules)
		{

			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}


	// 	// relacion
	// public static function Ciudad()
	// 	{
	// 		return hasMany('Ciudad');
	// 	}


}
