<?php
namespace Services\Validators;

class Blog extends Validator {
	public static $rules = array(
		'author'=>'Required|Between:1,40',
		'title'=>'Required|Max:100',
		'blog'=>'Required|Max:8192',
		'tags'=>'Max:256'
		);
}