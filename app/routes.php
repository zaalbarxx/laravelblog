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

Route::get('blog/{id}/{slug}',array('as'=>'blog_show','uses'=>'BlogController@show'))->where('id','[0-9]+');
Route::get('/',array( 'as'=>'home', 'uses'=>'MainController@index'));

Route::get('contact',array('as'=>'contact', function(){
	return View::make('layouts.master')->with('content',View::make('main.contact'));
}));

Route::get('about',array('as'=>'about', function(){
	return View::make('layouts.master')->with('content',View::make('main.about'));
}));
/*
END GET METHOD
 */

Route::post('comment_add/{blog_id}',array('as'=>'comment_add','uses'=>'BlogController@comment_add'));
Route::post('contact',array('as'=>'do_contact','uses'=>'MainController@do_contact'));
Route::post('search',array('as'=>'search','uses'=>'MainController@search'));


/*
VIEW COMPOSERS
 */
View::composer('partials.sidebar', 'SidebarComposer');

/*
END VIEW COMPOSERS
 */