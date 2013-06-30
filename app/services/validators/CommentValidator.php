<?php
namespace Services\Validators;

class Comment extends Validator {
	public static $rules = array(
		'user'=>'Required|Between:1,40',
		'body'=>'Required|Max:2048',
		);
}