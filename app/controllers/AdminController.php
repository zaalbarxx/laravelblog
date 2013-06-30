<?php
class AdminController extends BaseController {
	protected $layout = 'layouts.master_admin';

	public function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		try{
			Auth::attempt(array('identifier'=>$username,'password'=>$password),false);
			return Redirect::intended(URL::route('admin_index'));
		}
		catch(Exception $e){
			return Redirect::back()->with('message',Lang::get('main.login_failed'));
		}
	}

	public function blog_create(){
		$validator = new Services\Validators\Blog();
		if($validator->passes()){
			$blog = new Blog;
			$blog->author = Input::get('author');
			$blog->title = Input::get('title');
			$blog->body = Input::get('blog');
			$blog->tags = Input::get('tags');
			$blog->slug = Services\Utilities\Tools::slugify($blog->title);
			$blog->save();
			return Redirect::route('admin_blog_index')->with('message',Lang::get('main.blog_added_successfully'));
		}
		else{
			return Redirect::back()->withErrors($validator->getErrors());
		}
	}
	public function blog_delete($id){
		DB::table('blog')->where('id','=',$id)->take(1)->delete();
		return Redirect::back()->with('message',Lang::get('main.blog_deleted_successfully'));
	}
	public function blog_edit($id){
		$validator = new Services\Validators\Blog();
		if($validator->passes()){
			$blog = Blog::find($id);
			if(!$blog){
				return Redirect::route('admin_blog_index')->with('message',Lang::get('main.no_such_blog'));
			}
			$blog->author = Input::get('author');
			$blog->title = Input::get('title');
			$blog->body = Input::get('blog');
			$blog->tags = Input::get('tags');
			$blog->slug = Services\Utilities\Tools::slugify($blog->title);
			$blog->save();
			return Redirect::route('admin_blog_index')->with('message',Lang::get('main.blog_added_successfully'));
		}
		else{
			return Redirect::back()->withInput()->withErrors($validator->getErrors());
		}
	}

		public function blog_index(){
			$blogs = Blog::orderBy('created_at','DESC')->get();
			$this->layout->content = View::make('admin.blog.index')->with('data',$blogs);
		}

		public function comment_index(){
			$comments = Comment::orderBy('created_at','DESC')->get();
			$this->layout->content = View::make('admin.comment.index')->with('data',$comments);
		}
		public function comment_delete($id){
			DB::table('comment')->where('id','=',$id)->take(1)->delete();
			return Redirect::back()->with('message',Lang::get('main.comment_deleted_successfully'));
		}
		public function comment_edit($id){
			$validator = new Services\Validators\Comment();
			if($validator->passes()){
				$comment = Comment::find($id);
			if(!$comment){
				return Redirect::route('admin_comment_index')->with('message',Lang::get('main.no_such_comment'));
			}
			$comment->author = Input::get('user');
			$comment->comment = Input::get('body');
			$comment->save();
			return Redirect::route('admin_comment_index')->with('message',Lang::get('main.comment_edited_successfully'));
		}
		else{
			return Redirect::back()->withInput()->withErrors($validator->getErrors());
		}
	}
}
