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

Route::get('news/latest-updates/{title}', function($title){ 

    $allnews = array();
    if( Cache::has('allnews') )
    {
        $allnews = Cache::get('allnews');
    } else {
        $pcontroller =  new App\Http\Controllers\PriceController();
        $allnews = $pcontroller->getAllTrendingNews();
    }

    if ( Cache::has(urldecode($title)) ) 
    {
        $newsPage = Cache::get(urldecode($title));        
        return view('news.show', array(
            'title'             =>  $newsPage['title'],
            'source'            =>  !empty($newsPage['author']) ? $newsPage['author'] : $newsPage['domain'],
            'uri'               =>  urldecode($newsPage['url']),
            'datepublished'     =>  $newsPage['date'],
            'imageurl'          =>  $newsPage['iurl'],
            'kwic'              =>  $newsPage['kwic'],
            'allnews'           =>  $allnews
        ));
    } else {

    }
});

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

    dd(Cache::get('top_news_daily_front'));
        if(Cache::has('top_news_daily_front'))
        {
            $top_news_daily = json_decode( Cache::get('top_news_daily_front')['results'], true);            
        } 
        else {
            $top_news_daily = json_decode( file_get_contents(config('app.top_news_daily_uri')), true);
            if( isset($result['results']))
            {   
                Cache::forever('top_news_daily_front',$top_news_daily['results']);                
            }
        }
        foreach($top_news_daily['results'] as $key => $row)
        {
            $iurl = !empty($row['iurl']) ? $row['iurl']  : asset('img/gallery/image5.jpg');
            //cache the image

            $imgObj = Image::cache(function($image) use ($iurl) {
                $image->make($iurl)
                        ->resize(670, null, function ($constraint) {
                            $constraint->aspectRatio();
                    });
            }, 5, true);

            $top_news_daily['results'][$key]['mime_image'] = $imgObj->response('jpg');
        }


        dd($top_news_daily['results']); 

        dd(Cache::get('b4214b3ed4aa888a5aabf8c8dd2551f3'));
        $img = Image::make('http://d.ibtimes.co.uk/en/full/1480640/uproov.png')->resize(300, 200);
        $img->resize(670, null, function ($constraint) {
                $constraint->aspectRatio();
        });

        $imgObj = Image::cache(function($image) {
            $image->make('http://d.ibtimes.co.uk/en/full/1480640/uproov.png')
                    ->resize(670, null, function ($constraint) {
                        $constraint->aspectRatio();
                });
        }, 10, true);
        dd($imgObj);
        return $imgObj->response('jpg');

});

Route::get('alerts',function(){
	$top_news_daily = json_decode( file_get_contents(config('app.top_news_daily_uri')), true);
	dd($top_news_daily);
    if( isset($result['results']))
    {
        if( count($result['results']))
        {                
            $headliners = array_merge($result['results'],$headliners);
            Cache::forever('top_news_daily',$headliners);
        }
    }

	/*
		$keywords = array(           
            'altcoin', 
            'cryptocurrency',
            'blockchain',                        
            'bitcoin',
        );
        $headliners = array();
        foreach($keywords as $keyword)
        {
            $params = array(
                'q'         =>  $keyword,
                'start'     =>  1,
                'length'    => 2,
                'l'         => 'en',
                'src'       =>  'news',
                'f'         =>  'json',
                'key'       =>  config('app.faroo_api_key')['key']
            );

            $uri = config('app.faroo_api_key')['api_uri'] . '?' .http_build_query($params);                        

            $result = json_decode( file_get_contents($uri), true );            

            if( isset($result['results']))
            {
                if( count($result['results']))
                {                
                    $headliners = array_merge($result['results'],$headliners);
                }
            }	        
        }       
        Cache::forever('test', $headliners);    	
        */
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
