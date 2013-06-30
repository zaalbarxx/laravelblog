<?php
class BlogController extends BaseController {
	protected $layout = 'layouts.master';
	private $cycle = 'odd';

	public function show($id,$slug){
		$blog = Blog::find($id);
		$comments = $blog->comment()->orderBy('created_at','DESC')->paginate(3);
		$cycle = 'odd';
		
		foreach($blog->comment as $c){
			$c->cycle = $this->cycle();
		}
		$view = View::make('blog.show');
		$view->blog = $blog;
		$view->comments = $comments;
		$this->layout->content = $view;
	}

	public function comment_add($blog_id){
		$blog = Blog::find($blog_id);
		if(!$blog){
			return Redirect::back()->with('message', Lang::get('main.no_such_blog'));
		}

		$validator = new Services\Validators\Comment();
		if($validator->passes()){
			$comment = new Comment;
			$comment->blog_id = $blog_id;
			$comment->author = Input::get('user');
			$comment->comment = Input::get('body');
			$comment->approved = 1;
			$comment->save();
			return Redirect::route('blog_show',array('id'=>$blog_id,'slug'=>$blog->slug))->with('message',Lang::get('main.comment_added_successfully'));
		}
		else{
			return Redirect::back()->withInput()->withErrors($validator->getErrors());
		}



	}
	private function cycle(){
		if($this->cycle=='odd'){
			$this->cycle = 'even';
			return $this->cycle;
		}
		else{
			$this->cycle = 'odd';
			return $this->cycle;
		}
	}
}