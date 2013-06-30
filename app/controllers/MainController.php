<?php

class MainController extends BaseController {
	protected $layout = 'layouts.master';

	public function index()
	{
		$blogs = Blog::with(array('comment'=>function($query){
			$query->select(DB::raw('count(*) as counter,blog_id'))->groupBy('blog_id');
		}))->get();

		foreach($blogs as $b){
			if(strlen($b->body)>300){
				$b->body = Services\Utilities\Tools::truncate($b->body,300);
				$b->truncated = true;
			}
		}
		$view = View::make('main.index');
		$view->data = $blogs;
		//$this->layout->querylog = DB::getQueryLog();
		$this->layout->content = $view;
	}


	public function do_contact(){
			$validator = new Services\Validators\Contact();
			if($validator->passes()){
				$contact_msg = new Contact;
				$contact_msg->name = Input::get('name');
				$contact_msg->email = Input::get('email');
				$contact_msg->subject = Input::get('subject');
				$contact_msg->message = Input::get('message');
				$contact_msg->save();
				return Redirect::back()->with('message',Lang::get('main.message_sent_successfully'));
			}
			else{
				return Redirect::back()->withErrors($validator->getErrors());
			}
	}

}