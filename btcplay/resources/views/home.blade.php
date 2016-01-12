@extends('master')
@section('content')
	<!-- BEGIN PAGE HEADER-->
     <div class="row">
        <div class="col-md-12">
           <!-- BEGIN PAGE TITLE & BREADCRUMB-->           
           <ul class="page-breadcrumb breadcrumb">
              <li>
                 <i class="icon-home"></i>
                 <a href="/">Home</a> 
                 <i class="icon-angle-right"></i>
              </li>
              <li><a href="#">Dashboard</a></li>              
           </ul>
           <h3 class="page-title">
              Bitcoin Global Price <small>latest global events ( {{ date('F d, Y') }} )</small>
           </h3>
           <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
        <!-- NEWS PAGE LANE --> 
        <div class="col-md-12 news-page">
              <div class="col-md-5">
                 <div id="myCarousel" class="carousel image-carousel slide">
                    <div class="carousel-inner">
                       @foreach($headliners as $index => $headline)
                       <div class="{{ $index==0 ? 'active' : ''}} item" style="min-height:380px;">
                          <img src="{{ !empty($headline['image']['url']) ? $headline['image']['url'] : asset('img/gallery/image5.jpg') }}" class="img-responsive" alt="">
                          <div class="carousel-caption">
                             <h4><a href="{{ $headline['unescapedUrl'] }}" target="_newspage">{{ $headline['titleNoFormatting'] }}</a></h4>
                             <p>{{ strip_tags($headline['content']) }}(Source: {{ $headline['publisher']  }})</p>
                          </div>
                       </div>
                       @endforeach
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <i class="m-icon-big-swapleft m-icon-white"></i>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <i class="m-icon-big-swapright m-icon-white"></i>
                    </a>
                    <ol class="carousel-indicators">
                      @foreach( range(0, count($headliners) ) as $index )
                        <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                      @endforeach
                    </ol>
                 </div>                                 
              </div>                
              <div class="col-md-7">
                <!-- BEGIN DASHBOARD STATS -->
                 <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat blue">
                          <div class="visual">
                             <i class="icon-comments"></i>
                          </div>
                          <div class="details">
                             <div class="number coinsph">
                                {{ $prices['coinsph']['quote']['ask'] }}
                             </div>
                             <div class="desc">                           
                                Coins.ph Exchange
                             </div>
                          </div>
                          <a class="more" data-toggle="modal" href="#wide">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat green">
                          <div class="visual">
                             <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="details">
                             <div class="number blockchaininfo">{{ $prices['blockchaininfo']['price'] }}</div>
                             <div class="desc">Blockchain.info</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat purple">
                          <div class="visual">
                             <i class="icon-globe"></i>
                          </div>
                          <div class="details">
                             <div class="number bitfinex">{{ $prices['bitfinex']['last_price'] }}</div>
                             <div class="desc">Bitfinex</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat yellow">
                          <div class="visual">
                             <i class="icon-bar-chart"></i>
                          </div>
                          <div class="details">
                             <div class="number bitstamp">{{ $prices['bitstamp']['last'] }}</div>
                             <div class="desc">{{ $prices['bitstamp']['exchange'] }}</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat red">
                          <div class="visual">
                             <i class="icon-bar-chart"></i>
                          </div>
                          <div class="details">
                             <div class="number btce">{{ $prices['btce']['last'] }}</div>
                             <div class="desc">{{ $prices['btce']['exchange'] }}</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat peach">
                          <div class="visual">
                             <i class="icon-bar-chart"></i>
                          </div>
                          <div class="details">
                             <div class="number bitcoinaverage">{{ $prices['bitcoinaverage']['USD']['last'] }}</div>
                             <div class="desc">{{ $prices['bitcoinaverage']['exchange'] }}</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat lightblue">
                          <div class="visual">
                             <i class="icon-bar-chart"></i>
                          </div>
                          <div class="details">
                             <div class="number bitpay">{{ $prices['bitpay']['rate'] }}</div>
                             <div class="desc">{{ $prices['bitpay']['exchange'] }}</div>
                          </div>
                          <a class="more" href="#">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                  </div>
                  <!-- END DASHBOARD STATS -->
              </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="row">
              <div class="top-news">
                  <a href="#" class="btn blue">
                  <span>Featured News</span>
                  <em>
                  <i class="icon-tags"></i>
                  Bitcoin and Blockchain
                  </em>
                  <i class="icon- icon-bullhorn top-news-icon"></i>                             
                  </a>
               </div>
                @if(isset($top_news_daily['responseData']['results']))
                 @foreach($top_news_daily['responseData']['results'] as $news)
                 <div class="news-blocks">
                    <h3><a href="{{$news['unescapedUrl']}}" target="_newspage">{{ $news['titleNoFormatting'] }}</a></h3>
                    <div class="news-block-tags">
                       <strong>{{ $news['publisher'] }}</strong>
                       <em>{{ $news['publishedDate']}}</em>
                    </div>
                    <p><img class="news-block-img pull-right" src="{{ !empty($news['image']['url']) ? $news['image']['url'] : asset('img/gallery/image5.jpg') }}" width="{{ !empty($news['image']['tbWidth']) ? $news['image']['tbWidth'] : '70' }}" width="{{ !empty($news['image']['tbHeight']) ? $news['image']['tbHeight'] : '70'}}" alt="{{ $news['publisher'] }}">
                      {{ strip_tags($news['content']) }}
                    </p>
                    <a href="{{ $news['unescapedUrl'] }}" target="_newspage" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>                              
                    </a>                          
                 </div>
                 @endforeach
                @endif     
          </div>
            <!-- END NEWS PAGE LANE-->            
     </div>
     <!-- END PAGE HEADER-->
      <!--
      <div class="row">        
        <div class="panel panel-primary">
           <div class="panel-heading">
              <h3 class="panel-title">Global Economic Indicators</h3>
           </div>             
           <div class="panel-body" style=" padding-left: 0px; margin-left: -18px;">
              <div class="col-lg-12">
                <div class="col-md-6">
                  <iframe src="http://ec.forexprostools.com?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&features=datepicker,timezone&countries=25,32,6,37,72,22,17,39,14,10,35,43,56,36,110,11,26,12,4,5&calType=week&timeZone=55&lang=1" width="500" height="400" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe>
                </div>
                <div class="col-md-6">
                  <iframe frameborder="0" scrolling="no" height="200" width="500" allowtransparency="true" marginwidth="0" marginheight="0" src="http://charts.investing.com/index.php?pair_ID=21&timescale=300&candles=50&style=candles"></iframe>
                </div>
              </div>              
           </div>
        </div>
      </div>
     -->
        
                  

@stop
