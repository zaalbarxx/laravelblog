<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
GET METHOD
 */
	$languages = array('en','pl');
	$locale = Request::segment(1);
	if(in_array($locale, $languages)){
		\App::setLocale($locale);
	}else{
		$locale = null;
	}

Route::group(array('prefix'=>$locale),function(){

Route::get('admin/login',function(){
	return View::make('layouts.master_admin')->with('content',View::make('admin.login'));
});

Route::get('admin/logout',array('as'=>'admin_logout',function(){
	Auth::logout();
	return Redirect::route('admin_index');
}));

Route::get('contact',array('as'=>'contact', function(){
	return View::make('layouts.master')->with('content',View::make('main.contact'));
}));

Route::get('about',array('as'=>'about', function(){
	return View::make('layouts.master')->with('content',View::make('main.about'));
}));

Route::get('blog/{id}/{slug}',array('as'=>'blog_show','uses'=>'BlogController@show'))->where('id','[0-9]+');
Route::get('/',array( 'as'=>'home', 'uses'=>'MainController@index'));
/*
END GET METHOD
 */
Route::post('admin/login',array('as'=>'do_login','uses'=>'AdminController@login'));
Route::post('comment_add/{blog_id}',array('as'=>'do_comment_add','uses'=>'BlogController@comment_add'));
Route::post('contact',array('as'=>'do_contact','uses'=>'MainController@do_contact'));
Route::get('search',array('as'=>'do_search','uses'=>'MainController@search'));

Route::group(array('before'=>'auth'),function(){
	Route::get('admin/blog/create',array('as'=>'admin_blog_create',function(){
		return View::make('layouts.master_admin')->with('content',View::make('admin.blog.create_edit')->with('mode','create'));
	}));

	Route::get('admin/blog/{id}/edit',array('as'=>'admin_blog_edit',function($id){
		$blog = Blog::find($id);
		if($blog){
			$view = View::make('admin.blog.create_edit')->with('data',$blog)->with('mode','edit');
			return View::make('layouts.master_admin')->with('content',$view);
		}
		else{
			return Redirect::route('admin_index')->with('message',Lang::get('main.no_such_blog'));
		}
	}));

	Route::get('admin/comment/{id}/edit',array('as'=>'admin_comment_edit',function($id){
		$comment = Comment::find($id);
		if($comment){
			$view = View::make('admin.comment.edit')->with('data',$comment);
			return View::make('layouts.master_admin')->with('content',$view);
		}
		else{
			return Redirect::route('admin_index')->with('message',Lang::get('main.no_such_blog'));
		}
	}));

	Route::get('admin',function(){
		return Redirect::route('admin_index');
	});

	Route::get('admin/index',array('as'=>'admin_index',function(){
		return View::make('layouts.master_admin')->with('content',View::make('admin.index'));
	}));

	Route::get('admin/comment/index',array('as'=>'admin_comment_index','uses'=>'AdminController@comment_index'));
	Route::get('admin/blog/index',array('as'=>'admin_blog_index','uses'=>'AdminController@blog_index'));
	Route::get('admin/blog/{id}/delete',array('as'=>'do_admin_blog_delete','uses'=>'AdminController@blog_delete'));
	Route::get('admin/comment/{id}/delete',array('as'=>'do_admin_comment_delete','uses'=>'AdminController@comment_delete'));

	Route::post('admin/blog/create',array('as'=>'do_admin_blog_create','uses'=>'AdminController@blog_create'));
	Route::post('admin/blog/{id}/edit',array('as'=>'do_admin_blog_edit','uses'=>'AdminController@blog_edit'));
	Route::post('admin/comment/{id}/edit',array('as'=>'do_admin_comment_edit','uses'=>'AdminController@comment_edit'));
});
});


/*
ROUTE GROUPS
 */





/*
END ROUTE GROUPS
 */

/*
VIEW COMPOSERS
 */
View::composer('partials.sidebar', 'SidebarComposer');

/*
END VIEW COMPOSERS
 */