<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Cache;
use Intervention\Image\Facades\Image;


class PriceController extends Controller
{
    /**
     * Show the price from a given exchange
     *
     * @param  int  $id
     * @return Response
     */
    public function showPrices()
    {
        $prices = array();
        //$prices = self::getBTCPrices();
        if( Cache::has('btc_prices') )
        {            
            $prices = Cache::get('btc_prices');
        }
        else 
        {
            $prices = self::getBTCPrices();
        }

        //$ip = $_SERVER['REMOTE_ADDR'];
        //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));

        if( Request::ajax() )
        {
            return response()->json(
                array(
                    'prices' => $prices,                    
                    'city'      =>  '',//$details->city,
                    'region'      =>  '',//$details->region,
                    'country'   =>  '',//$details->country
                )
            );
        }

	if(Cache::has('headliners'))
        {
            $headliners = Cache::get('headliners');
        } else {
	    $headliners = self::getAllTrendingNews();
	}

        if(Cache::has('top_news_daily_front'))
        {
            $top_news_daily = Cache::get('top_news_daily_front');            
        } else {
            $top_news_daily =	self::getTopNewsDaily(); 
	}
        
        
        return view('home',
            array(
                'prices' => $prices,
                'top_news_daily' => $top_news_daily,
                'headliners'    => $headliners,
                'city'      =>  '',//$details->city,
                'region'      =>  '',//$details->region,
                'country'   =>  ''//$details->country
            )
        );
        
    }

    public function cachedNewsImages($news = array())
    {
        //if(!isset($news['results'])) 
         //   return array();

        foreach($news as $key => $row)
        {

            $iurl = !empty($row['iurl']) ? $row['iurl']  : asset('img/gallery/image5.jpg');
            //cache the image
            /*
            $imgObj = Image::cache(function($image) use ($iurl) {
                $image->make($iurl)
                        ->resize(670, null, function ($constraint) {
                            $constraint->aspectRatio();
                    });
            }, 15, true);
            $res = $imgObj->response('png');
            $procImg = 'data:image/' . 'png' . ';base64,' . base64_encode($res);
            $news[$key]['mime_image'] = $procImg;
            */
            Cache::put($row['title'], $news[$key], 1440);
        }

        return $news;
    }

    public function getTopNewsDaily()
    {   
        //if(Cache::has('top_news_daily_front'))
        //{
         //   $top_news_daily = Cache::get('top_news_daily_front');            
        //} 
        //else {
            $top_news_daily = json_decode( file_get_contents(config('app.top_news_daily_uri')), true);            
            if( isset($top_news_daily['results']))
            {   
                $top_news_daily = $this->cachedNewsImages($top_news_daily['results']);                
                Cache::forever('top_news_daily_front',$top_news_daily);                
            }
        //}

        return isset($top_news_daily['results']) ? $top_news_daily['results'] : $top_news_daily;
    }

    public function getAllTrendingNews()
    {
        $allnews = array();
        //if(Cache::has('allnews'))
        //{
        //    $allnews  = json_decode( Cache::get('allnews'), true);            
        //} else {
            $allnews = $this->getHeadlines(8,'allnews'); 
        //}

        return $allnews;
    }

    public function getHeadlines($limit=2, $cacheName = 'headliners')
    {
        $uri = 'https://ajax.googleapis.com/ajax/services/search/news?v=1.0&rsz=' . $limit . '&q=';        
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
                'length'    => $limit,
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
            sleep(1);
        }

        $headliners = $this->cachedNewsImages($headliners); 
        Cache::forever($cacheName, $headliners);

        return $headliners;
    }

    public function getBTCPrices()
    {
        $prices = array();

        $prices['coinsph'] = self::getCoinsph();
        $prices['blockchaininfo'] = self::getBlockchainInfo();
        $prices['bitfinex'] = self::getBitfinex();
        $prices['bitstamp'] = self::getBitstamp();
        $prices['btce'] = self::getBtce();
        $prices['bitcoinaverage'] = self::getBitcoinaverage();
        $prices['bitpay'] = self::getBitpay();
        $prices['huobi'] = self::getHuobi();

        Cache::forever('btc_prices',$prices);
        return $prices;
    }

    private function getBitpay()
    {
        $url = config('app.exchanges_uri')['bitpay'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitpay';
        $json['rate'] = 'USD $' . number_format($json[1]["rate"], 2);
        return $json;
    }

    private function getBitcoinaverage()
    {
        $url = config('app.exchanges_uri')['bitcoinaverage'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitcoinaverage';
        if(!empty($json["USD"]['last']))
        {
            Cache::put('bitcoinaverage_price', $json["USD"]['last'], 5);
        }
        $json["USD"]['last'] = !empty($json["USD"]['last']) ? 'USD $' . number_format($json["USD"]['last'], 2) : Cache::get('bitcoinaverage_price');
        return $json;        
    }

    private function getCoinBase()
    {
       $url = config('app.exchanges_uri')['coinbase'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Coinbase';
        $json['last'] = !empty($json["amount"]) ? 'USD $' . number_format($json["amount"], 2) : "Exchange unreachable :(";
        return $json;         
    }

    private function getHuobi()
    {
        $url = config('app.exchanges_uri')['huobi'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Huobi';
        if(!empty($json["ticker"]["last"]))
        {
            Cache::put('huobi_price', $json["ticker"]["last"],5);
        }
        
        $json['open'] = number_format( $json['open'] ,2);
        $json['vol'] = number_format( $json['vol'] ,4);
        $json['last'] = number_format( $json['last'] ,2);
        $json['buy'] = number_format( $json['buy'] ,2);
        $json['sell'] = number_format( $json['sell'] ,2);
        $json['high'] = number_format( $json['high'] ,2);
        $json['low'] = number_format( $json['low'] ,2);

        $json['last'] = !empty($json["ticker"]["last"]) ? 'CNY ¥' . number_format($json["ticker"]["last"], 2) : Cache::get('huobi_price');
        return $json;
    }

    private function getBtce()
    {
        $url = config('app.exchanges_uri')['btce'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'BTC-e';
        if(!empty($json["ticker"]["last"]))
        {
            Cache::put('btce_price',$json["ticker"]["last"], 5);
        }
        $json['last'] = !empty($json["ticker"]["last"]) ? 'USD $' . number_format($json["ticker"]["last"], 2) : Cache::get('btce_price');
        return $json;        
    }

    private function getBitstamp()
    {
        $url = config('app.exchanges_uri')['bitstamp'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitstamp';
        $json['last'] = !empty($json['last']) ? 'USD $' . number_format($json['last'], 2) : "Exchange unreachable :(";
        return $json;
    }

    private function getBitfinex()
    {
        $url = config('app.exchanges_uri')['bitfinex'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitfinex';
        if(!empty($json['last_price']))
        {
            Cache::put('bitfinex_price',$json['last_price'],5);
        }
        $json['last_price'] = !empty($json['last_price']) ? 'USD $' . number_format($json['last_price'], 2) : Cache::get('bitfinex_price');
        $json['ask'] = 'USD $' . $json['ask'];
        $json['bid'] = 'USD $' . $json['bid'];        
        return $json;
    }

    private function getBlockchainInfo()
    {
        $url = config('app.exchanges_uri')['blockchaininfo'];
        $json = self::getPriceUri($url);
        $price = $json["USD"]['last'];
        $price = 'USD $' .number_format($price, 2);

        $info = array(
            'price' => $price,
            'exchange' => 'Blockchain.info'
        );
        
        return $info;
    }

    private function getCoinsph()
    {
        $url = config('app.exchanges_uri')['coinsph'];
        $json = self::getPriceUri($url);        
        $json['exchange'] = 'Coins.ph';
        $json['quote']['ask'] = !empty($json["quote"]['ask']) ? $json["quote"]['currency'] .' ₱'.number_format($json["quote"]['ask'], 2) : "Exchange unreachable :-(";        
        $json['quote']['bid'] = !empty($json["quote"]['bid']) ? $json["quote"]['currency'] .' ₱'.number_format($json["quote"]['bid'], 2) : "Exchange unreachable :-(";


        return $json;
    }

    private function getPriceUri($url = '')
    {
        try{
            if(@file_get_contents($url))
            {
                $json = json_decode(file_get_contents($url), true);
            } else {
                return $json = array();
            }
        } catch(Exception $e)        
        {
            return $json = array();
        }
        return $json;
    }
}
