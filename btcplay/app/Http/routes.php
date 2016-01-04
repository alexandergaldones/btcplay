<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array(
	'uses' => 'PriceController@showPrices'
));


Route::get('price', array(
	'uses' => 'PriceController@showPrices'
));

Route::get('news/{tite}/{source}/{uri}/{datepublished}',function($title, $source, $uri, $datepublished){
	return view('news.shownews', array(
		'title' 			=> 	$title,
		'source'			=> 	$source,	
		'uri'				=>	$uri,
		'datepublished'		=>	$datepublished
	));
});


Route::get('latest-news',function(){
	
	$allnews = array();
	if( Cache::has('allnews') )
	{
		$allnews = Cache::get('allnews');
	} else {
		$pcontroller =  new App\Http\Controllers\PriceController();
		$allnews = $pcontroller->getAllTrendingNews();
	}
	
	return view('news.allnews', array(
		'allnews' => $allnews
	));
});

Route::get('test',function(){

	$ns = json_encode ( simplexml_load_string( file_get_contents('http://news.google.com/news/section?q=apple&output=rss') ) );
	$ns2 = json_decode($ns, true);
	dd($ns2);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
