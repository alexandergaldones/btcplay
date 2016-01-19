@extends('master')
@section('content')
	<!-- BEGIN PAGE HEADER-->
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
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
                       <div class="{{ $index==0 ? 'active' : ''}} item" style="min-height:320px;">
                          <img src="{{ !empty($headline['iurl']) ? $headline['iurl'] : config('app.imager') [ array_rand(config('app.imager')) ] }}" class="img-responsive" alt="">
                          <div class="carousel-caption">
                             <h4><a href="index.php/news/latest-updates/{{ urlencode($headline['title']) }}" >{{ $headline['title'] }}</a></h4>
                             <p>{{ strip_tags($headline['kwic']) }}(Source: {{ !empty($headline['author']) ? $headline['author'] : $headline['domain']  }})</p>
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
                          <a class="more" data-toggle="modal" href="#modal_coinsph">
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
                          <a class="more" data-toggle="modal" href="#modal_bitfinex">
                          View more <i class="m-icon-swapright m-icon-white"></i>
                          </a>                 
                       </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                       <div class="dashboard-stat blue">
                          <div class="visual">
                             <i class="icon-bar-chart"></i>
                          </div>
                          <div class="details">
                             <div class="number huobi">{{ $prices['huobi']['last'] }}</div>
                             <div class="desc">{{ $prices['huobi']['exchange'] }}</div>
                          </div>
                          <a class="more" data-toggle="modal" href="#modal_huobi">
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
                    @include('modal_exchanges.coinsph')                        
                    @include('modal_exchanges.bitfinex')
                    @include('modal_exchanges.huobi')
                   <!-- END EXCHANGE MODALS -->

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
                @if(isset($top_news_daily))
                 @foreach($top_news_daily as $news)                 
                 <div class="news-blocks">
                    <h3><a href="index.php/news/latest-updates/{{ urlencode($news['title']) }}" >{{ $news['title'] }}</a></h3>
                    <div class="news-block-tags">
                       <strong>{{ !empty($news['author']) ? $news['author'] : $news['domain'] }}</strong>
                       <em>{{ date('H:i:s', floor($news['date']/1000) ) }}</em>
                    </div>
                    <p><img class="news-block-img pull-right" src="{{ !empty($news['iurl']) ? $news['iurl'] : config('app.imager') [ array_rand(config('app.imager')) ] }}" width="70" height="70" alt="{{ $news['author'] }}">
                      {{ strip_tags($news['kwic']) }}
                    </p>
                    <a href="{{ $news['url'] }}" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>                              
                    </a>                          
                 </div>
                 @endforeach
                @endif     
          </div>
            <!-- END NEWS PAGE LANE-->            
     </div>

@stop
