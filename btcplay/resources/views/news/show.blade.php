@extends('master')
@section('content')

<div class="col-md-12">
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">
      {{ urldecode($title) }} <small>{{ urldecode($source) }} - Posted {{ urldecode(date('H:i:s', floor($datepublished/1000) )) }} ago...</small>
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
   <!-- BEGIN PAGE CONTENT-->
         <div class="row">
            <div class="col-md-12 news-page blog-page">
               <div class="row">
                  <div class="col-md-9 blog-tag-data">
                     <h3>Recent News</h3>
                     <img src="{{ !empty($imageurl) ? $imageurl : config('app.imager') [ array_rand(config('app.imager')) ]  }}" class="img-responsive" alt="{{ urldecode($title) }}" style="
    max-height: 650px;">
                     <div class="row">
                        <div class="col-md-6">
                           <ul class="list-inline blog-tags">
                              <li>
                                 <i class="icon-tags"></i> 
                                 <a href="#">Technology</a> 
                                 <a href="#">Education</a>
                                 <a href="#">Internet</a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-md-6 blog-tag-data-inner">
                           <ul class="list-inline">
                              <li><i class="icon-calendar"></i> <a href="#">{{ date('F d, Y') }}</a></li>
                              <li><i class="icon-comments"></i> <a href="#">{{rand(1,77)}} Comments</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="news-item-page" style="font-size:18px;">
                        <p>
                           {{ $kwic }}
                           <a href="{{ $uri }}" target="_newspage" class="news-block-btn">
                         Show more 
                          <i class="m-icon-swapright m-icon-black"></i>  
                        </p>                        
                        <p>
                           <a href="{{ $uri }}" target="_newspage" class="btn green" style="font-size: 24px;">
                                 Read full article &nbsp;<i class="m-icon-swapright m-icon-white" style="margin-top:13px;"></i>
                           </a>
                        </p>
                     </div>
                     <hr>
                     <div class="media">
                        <h3>Comments</h3>
                        <a href="#" class="pull-left">                        
                     </div>
                     <!--end media-->
                     <div class="media">
                        <a href="#" class="pull-left">                        
                        </a>
                        <div class="media-body">
                           {{-- COMMENTS HERE --}}
                        </div>
                     </div>
                     <!--end media-->
                     <hr>
                     <div class="post-comment">
                        <h3>Leave a Comment</h3>
                        <form role="form">
                           <div class="form-group">
                              <label class="control-label">Name<span class="required">*</span></label>
                              <input type="text" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Email<span class="required">*</span></label>
                              <input type="text" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Message<span class="required">*</span></label>
                              <textarea class="form-control" rows="8"></textarea>
                           </div>
                           <button class="btn blue margin-top-10" type="submit">Post a Comment</button>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <h3>Trending News</h3>
                     <div class="top-news">
                        <a href="#" class="btn green">
                        <span>Top Week</span>
                        <em>Posted on: April 15, 2013</em>
                        <em>
                        <i class="icon-tags"></i>
                        Internet, Music, People
                        </em>
                        <i class="icon-music top-news-icon"></i>                             
                        </a>
                        <a href="#" class="btn yellow">
                        <span>Study Abroad</span>
                        <em>Posted on: April 13, 2013</em>
                        <em>
                        <i class="icon-tags"></i>
                        Education, Students, Canada
                        </em>
                        <i class="icon-book top-news-icon"></i>                              
                        </a>
                        <a href="#" class="btn red">
                        <span>Metronic News</span>
                        <em>Posted on: April 16, 2013</em>
                        <em>
                        <i class="icon-tags"></i>
                        Money, Business, Google
                        </em>
                        <i class="icon-briefcase top-news-icon"></i>
                        </a>
                        <a href="#" class="btn blue">
                        <span>Gold Price Falls</span>
                        <em>Posted on: April 14, 2013</em>
                        <em>
                        <i class="icon-tags"></i>
                        USA, Business, Apple
                        </em>
                        <i class="icon-globe top-news-icon"></i>                             
                        </a>
                     </div>
                     <div class="space20"></div>
                     <h3>News Tags</h3>
                     <ul class="list-inline sidebar-tags">
                        <li><a href="#"><i class="icon-tags"></i> Business</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Music</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Internet</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Money</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Google</a></li>
                        <li><a href="#"><i class="icon-tags"></i> TV Shows</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Education</a></li>
                        <li><a href="#"><i class="icon-tags"></i> People</a></li>
                        <li><a href="#"><i class="icon-tags"></i> People</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Math</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Photos</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Electronics</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Apple</a></li>
                        <li><a href="#"><i class="icon-tags"></i> Canada</a></li>
                     </ul>
                     <div class="space20"></div>
                     <h3>Tabs</h3>
                     <div class="tabbable tabbable-custom">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#tab_1_1">Section 1</a></li>
                           <li ><a data-toggle="tab" href="#tab_1_2">Section 2</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="tab_1_1" class="tab-pane active">
                              <p>I'm in Section 1.</p>
                              <p>
                                 Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
                              </p>
                           </div>
                           <div id="tab_1_2" class="tab-pane">
                              <p>Howdy, I'm in Section 2.</p>
                              <p>
                                 Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="space20"></div>
                     <h3>Recent Twitts</h3>
                     <div class="blog-twitter">
                        <div class="blog-twitter-block">
                           <a href="">@keenthemes</a> 
                           <p>At vero eos et accusamus et iusto odio.</p>
                           <a href="#"><em>http://t.co/sBav7dm</em></a> 
                           <span>5 hours ago</span>
                           <i class="icon-twitter blog-twiiter-icon"></i>
                        </div>
                        <div class="blog-twitter-block">
                           <a href="">@keenthemes</a> 
                           <p>At vero eos et accusamus et iusto odio.</p>
                           <a href="#"><em>http://t.co/sBav7dm</em></a> 
                           <span>8 hours ago</span>
                           <i class="icon-twitter blog-twiiter-icon"></i>
                        </div>
                        <div class="blog-twitter-block">
                           <a href="">@keenthemes</a> 
                           <p>At vero eos et accusamus et iusto odio.</p>
                           <a href="#"><em>http://t.co/sBav7dm</em></a> 
                           <span>12 hours ago</span>
                           <i class="icon-twitter blog-twiiter-icon"></i>
                        </div>
                     </div>
                     <div class="space20"></div>
                     <h3>Related News</h3>
                     <ul class="list-inline blog-images">
                        <li>
                           <a class="fancybox-button" data-rel="fancybox-button" title="390 x 220 - keenthemes.com" href="assets/img/blog/1.jpg">
                           <img alt="" src="assets/img/blog/1.jpg">
                           </a>
                        </li>
                        @foreach($allnews as $news)
                        <li><a href="#"><img alt="{{ $news['title'] }}" src="{{ $news['iurl'] }}"></a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- END PAGE CONTENT-->
</div>

@stop
