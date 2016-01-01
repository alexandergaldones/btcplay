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
	        $('.bitfinex').html(data.prices.bitfinex.last_price);
	        $('.coinsph').html(data.prices.coinsph.quote.ask);
	        $('.blockchaininfo').html(data.prices.blockchaininfo.price);
	        $('.bitstamp').html(data.prices.bitstamp.price);
	        $('.btce').html(data.prices.btce.price);
	    }).responseText;
	    $('div.feedback-box').html(feedback);
	}	
});
