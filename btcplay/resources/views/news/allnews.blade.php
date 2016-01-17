@extends('master')
@section('content')

<div class="col-md-12">
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">
      Recent News <small>updated every minute</small>
   </h3>
   <ul class="page-breadcrumb breadcrumb">     
      <li>
         <i class="icon-home"></i>
         <a href="/">Home</a> 
         <i class="icon-angle-right"></i>
      </li>
      <li>
         <a href="#">Top Daily News</a>
         <i class="icon-angle-right"></i>
      </li>
      <li><a href="#">News</a></li>
   </ul>
   <!-- END PAGE TITLE & BREADCRUMB-->
   <div class="col-md-12">
         <div class="top-news">
            <a href="#" class="btn red">
            <span>World News</span>
            <em>
            <i class="icon-tags"></i>
            Bitcoin, Altcoin, Blockchain
            </em>
            <i class="icon-globe top-news-icon"></i>
            </a>
         </div>         
         @foreach($allnews as $news)
         <div class="news-blocks">
           <h3><a href="news/latest-updates/{{ urlencode($news['title']) }}" >{{ $news['title'] }}</a></h3>
           <div class="news-block-tags">
              <strong>{{ $news['author'] }}</strong>
              <em>{{ date('Y/m/d H:i:s',$news['date']) }}</em>
           </div>
           <p><img class="news-block-img pull-right" src="{{ !empty( $news['iurl'] ) ? $news['iurl'] : config('app.imager') [ array_rand(config('app.imager')) ] }}" width="70px" height="70px" alt="$news['author']">
             {{ strip_tags($news['kwic']) }}
           </p>
           <a href="{{ $news['url'] }}" target="_newspage" class="news-block-btn">
           Read more
           <i class="m-icon-swapright m-icon-black"></i>                              
           </a>                          
         </div>
         @endforeach
      </div>

   </div>
</div>

@stop
