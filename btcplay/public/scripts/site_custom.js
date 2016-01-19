$(function(){
	setInterval(function(){
		get_btcprice();
	}, 5000);
	function get_btcprice(){
	    var feedback = $.ajax({
	        type: "GET",
	        url: "/index.php/price",
	        async: true
	    })
	    .success(function(data){	       
		document.title = data.prices.bitcoinaverage.USD.last + ' = 1 ɃTC - Bitgp.com Your Bitcoin latest news updates and alerts for Bitcoin, Blockchain and Cryptocurrencies in '  + data.city + ', ' + data.region + ', ' + data.country; 
			//bitfinexupdate
	        $('.bitfinex').html(data.prices.bitfinex.last_price);
	        $('.bitfinex-ask').html(data.prices.bitfinex.ask);
	        $('.bitfinex-bid').html(data.prices.bitfinex.bid);
	        //end bitfinex

	        //coinsphupdate
	        $('.coinsph').html(data.prices.coinsph.quote.ask);
	        $('.coinsph-ask').html(data.prices.coinsph.quote.ask);
	        $('.coinsph-bid').html(data.prices.coinsph.quote.bid);
	        //end coinsphupdate


	        $('.blockchaininfo').html(data.prices.blockchaininfo.price);
	        $('.bitstamp').html(data.prices.bitstamp.price);
	        $('.btce').html(data.prices.btce.price);

	        //huobiupdate	      
	        $('.huobi').html(data.prices.huobi.last);
	        $('.huobi-open').html(data.prices.huobi.open);
	        $('.huobi-vol').html(data.prices.huobi.vol);
	        $('.huobi-last').html(data.prices.huobi.last);
	        $('.huobi-buy').html(data.prices.huobi.buy);
	        $('.huobi-sell').html(data.prices.huobi.sell);
	        $('.huobi-high').html(data.prices.huobi.high);
	        $('.huobi-low').html(data.prices.huobi.low);
	        //end huobi update
	        $('.bitcoinaverage').html(data.prices.bitcoinaverage.USD.last);
	        $('.bitpay').html(data.prices.bitpay.rate);
	    }).responseText;
	    $('div.feedback-box').html(feedback);
	}	
});



