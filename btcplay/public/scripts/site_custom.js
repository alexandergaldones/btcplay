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
	        $('.bitfinex').html(data.prices.bitfinex.last_price);
	        $('.coinsph').html(data.prices.coinsph.quote.ask);
	        $('.blockchaininfo').html(data.prices.blockchaininfo.price);
	        $('.bitstamp').html(data.prices.bitstamp.price);
	        $('.btce').html(data.prices.btce.price);
	        $('.huobi').html(data.prices.huobi.last);
	        $('.bitcoinaverage').html(data.prices.bitcoinaverage.USD.last);
	        $('.bitpay').html(data.prices.bitpay.rate);
	    }).responseText;
	    $('div.feedback-box').html(feedback);
	}	
});
