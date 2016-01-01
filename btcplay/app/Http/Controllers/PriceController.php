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

        if( Cache::has('btc_prices') )
        {            
            $prices = Cache::get('btc_prices');
        }
        else 
        {
            $prices['coinsph'] = self::getCoinsph();
            $prices['blockchaininfo'] = self::getBlockchainInfo();
            $prices['bitfinex'] = self::getBitfinex();
            $prices['bitstamp'] = self::getBitstamp();
            $prices['btce'] = self::getBtce();

            Cache::put('btc_prices', $prices, 1);
        }

        if( Request::ajax() )
        {
            return response()->json(
                array(
                    'prices' => $prices
                )
            );
        }

        
            return view('home',
                array(
                    'prices' => $prices
                )
            );
        
    }

    private function getBitpay()
    {
        $url = config('app.exchanges_uri')['bitpay'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitpay';
        $json['last'] = 'USD $' . number_format($json[1]["rate"], 2);
        return $json;      
    }

    private function getBitcoinaverage()
    {
        $url = config('app.exchanges_uri')['bitcoinaverage'];
        $json = self::getPriceUri($url);
        $json['exchange'] = 'Bitcoinaverage';
        $json['last'] = 'USD $' . number_format($json["USD"]['last'], 2);
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
        $json['last_price'] = !empty($json['last_price']) ? 'USD $' . number_format($json['last_price'], 2) : "Exchange offline :-(";
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
        $price = 'PHP ' .number_format($price, 2);

        $info = array(
            'price' => $price,
            'exchange' => 'Coins.ph Exchange'
        );

        return $info;
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