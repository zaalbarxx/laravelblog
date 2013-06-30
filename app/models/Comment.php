<?php
class Comment extends Eloquent {
	protected $table = 'comment';
	
	public function blog(){
		return $this->belongsTo('Blog');
	}
}