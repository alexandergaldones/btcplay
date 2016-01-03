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
           <h3><a href="{{$news['unescapedUrl']}}" target="_newspage">{{ $news['titleNoFormatting'] }}</a></h3>
           <div class="news-block-tags">
              <strong>{{ $news['publisher'] }}</strong>
              <em>{{ $news['publishedDate'] }}</em>
           </div>
           <p><img class="news-block-img pull-right" src="{{ !empty( $news['image']['url'] ) ? $news['image']['url'] : asset('img/gallery/image5.jpg') }}" width="{{ !empty($news['image']['tbWidth']) ? $news['image']['tbWidth'] : '70px' }}" width="{{ !empty($news['image']['tbHeight']) ? $news['image']['tbHeight'] : '70px'  }}" alt="$news['image']['publisher']">
             {{ strip_tags($news['content']) }}
           </p>
           <a href="{{ $news['unescapedUrl'] }}" target="_newspage" class="news-block-btn">
           Read more
           <i class="m-icon-swapright m-icon-black"></i>                              
           </a>                          
         </div>
         @endforeach
      </div>

   </div>
</div>

@stop