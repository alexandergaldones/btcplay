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
                  <a class="more" href="#">
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