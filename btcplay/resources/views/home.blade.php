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
              <div class="col-md-6">
                 <div id="myCarousel" class="carousel image-carousel slide">
                    <div class="carousel-inner">
                       <div class="active item">
                          <img src="{{ asset('img/gallery/image5.jpg') }}" class="img-responsive" alt="">
                          <div class="carousel-caption">
                             <h4><a href="#">First Thumbnail label</a></h4>
                             <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                          </div>
                       </div>
                       <div class="item">
                          <img src="{{ asset('img/gallery/image2.jpg') }}" class="img-responsive" alt="">
                          <div class="carousel-caption">
                             <h4><a href="#">Second Thumbnail label</a></h4>
                             <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                          </div>
                       </div>
                       <div class="item">
                          <img src="{{ asset('img/gallery/image1.jpg') }}" class="img-responsive" alt="">
                          <div class="carousel-caption">
                             <h4><a href="#">Third Thumbnail label</a></h4>
                             <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                          </div>
                       </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <i class="m-icon-big-swapleft m-icon-white"></i>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <i class="m-icon-big-swapright m-icon-white"></i>
                    </a>
                    <ol class="carousel-indicators">
                       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                       <li data-target="#myCarousel" data-slide-to="1"></li>
                       <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                 </div>                     
              </div>
              <div class="col-md-6">
              <div class="top-news">
                    <a href="#" class="btn blue">
                    <span>Featured News</span>
                    <em>
                    <i class="icon-tags"></i>
                    USA, Business, Apple
                    </em>
                    <i class="icon- icon-bullhorn top-news-icon"></i>                             
                    </a>
                 </div>
                 <div class="news-blocks">
                    <h3><a href="#">Google Glass Technology..</a></h3>
                    <div class="news-block-tags">
                       <strong>CA, USA</strong>
                       <em>3 hours ago</em>
                    </div>
                    <p><img class="news-block-img pull-right" src="assets/img/gallery/image1.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    <a href="#" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>                              
                    </a>                          
                 </div>
                 <div class="news-blocks">
                    <h3><a href="#">Sint occaecati cupiditat</a></h3>
                    <div class="news-block-tags">
                       <strong>London, UK</strong>
                       <em>7 hours ago</em>
                    </div>
                    <p><img class="news-block-img pull-right" src="assets/img/gallery/image4.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    <a href="#" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>                              
                    </a>                          
                 </div>
                 <div class="news-blocks">
                    <h3><a href="#">Accusamus et iusto odio</a></h3>
                    <div class="news-block-tags">
                       <strong>CA, USA</strong>
                       <em>3 hours ago</em>
                    </div>
                    <p><img class="news-block-img pull-right" src="assets/img/gallery/image5.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    <a href="#" class="news-block-btn">
                    Read more
                    <i class="m-icon-swapright m-icon-black"></i>                              
                    </a>                          
                 </div>
              </div>
        </div>
        <!-- END PAGE LANE-->
     </div>
     <!-- END PAGE HEADER-->
     <!-- BEGIN DASHBOARD STATS -->
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat yellow">
                  <div class="visual">
                     <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                     <div class="number">{{ $prices['bitstamp']['last'] }}</div>
                     <div class="desc">{{ $prices['bitstamp']['exchange'] }}</div>
                  </div>
                  <a class="more" href="#">
                  View more <i class="m-icon-swapright m-icon-white"></i>
                  </a>                 
               </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="dashboard-stat red">
                  <div class="visual">
                     <i class="icon-bar-chart"></i>
                  </div>
                  <div class="details">
                     <div class="number">{{ $prices['btce']['last'] }}</div>
                     <div class="desc">{{ $prices['btce']['exchange'] }}</div>
                  </div>
                  <a class="more" href="#">
                  View more <i class="m-icon-swapright m-icon-white"></i>
                  </a>                 
               </div>
            </div>
         </div>
         <!-- END DASHBOARD STATS -->

@stop