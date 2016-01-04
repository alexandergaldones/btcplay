<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Cache;


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

        if( Request::ajax() )
        {
            return response()->json(
                array(
                    'prices' => $prices
                )
            );
        }
        $headliners = self::getHeadlines();        
        $top_news_daily = self::getTopNewsDaily();
        
        return view('home',
            array(
                'prices' => $prices,
                'top_news_daily' => $top_news_daily,
                'headliners'    => $headliners
            )
        );
        
    }

    public function getTopNewsDaily()
    {
        $top_news_daily = array();
        if(Cache::has('top_news_daily'))
        {
            $top_news_daily = json_decode( Cache::get('top_news_daily'), true);
        } else {
            $top_news_daily = json_decode( file_get_contents(config('app.top_news_daily_uri').'?'.mt_rand()));
        }

        return $top_news_daily;        
    }

    public function getAllTrendingNews()
    {
        return $this->getHeadlines(8,'allnews');
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
            $result = json_decode( file_get_contents($uri.$keyword), true );            
	    if( is_array($result['responseData']['results']))
    	    {                
                $headliners = array_merge($result['responseData']['results'],$headliners);
    	    }
        }       
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
        $json["USD"]['last'] = !empty($json["USD"]['last']) ? 'USD $' . number_format($json["USD"]['last'], 2) : "Exchange unreachable :(";
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

    private function getBtce()
    {
        $url = config('app.exchanges_uri')['btce'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'BTC-e';
        $json['last'] = !empty($json["ticker"]["last"]) ? 'USD $' . number_format($json["ticker"]["last"], 2) : "Exchange unreachable :(";
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
        $json['last_price'] = !empty($json['last_price']) ? 'USD $' . number_format($json['last_price'], 2) : "Exchange unreachable :-(";
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
        $price = $json["quote"]['ask'];
        $json['exchange'] = 'Coins.ph';
        $json['quote']['ask'] = !empty($price) ? $json["quote"]['currency'] .number_format($price, 2) : "Exchange unreachable :-(";

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
