<?php
namespace Services\Validators;

class Contact extends Validator {
	public static $rules = array(
		'name'=>'Required|Between:2,40',
		'email'=>'Required|Email',
		'subject'=>'Max:80',
		'message'=>'Required|Between:10,1024'
		);
}