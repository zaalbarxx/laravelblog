<?php
namespace Services\Validators;
abstract class Validator
{
	protected $attributes;
	protected $errors;
	public function __construct($attributes=null)
	{
		$this->attributes = $attributes ?: \Input::all() ;
	}

	public function passes($rules = null)
	{
		if($rules == null){
			$rules = static::$rules;
		}
		$validation = \Validator::make($this->attributes, $rules);
		if ($validation->passes()) {
			return true;
		}
		$this->errors = $validation->errors();
		return false;
	}
	public function getErrors(){
		return $this->errors;
	}
}