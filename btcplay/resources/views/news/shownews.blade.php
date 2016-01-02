@extends('master')
@section('content')

<div class="col-md-12">
   <!-- BEGIN PAGE TITLE & BREADCRUMB-->
   <h3 class="page-title">
      {{ urldecode($title) }} <small>{{ urldecode($source) }} - Published {{ urldecode($datepublished) }}</small>
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
	   <iframe src="{{ urldecode($uri) }}" width="100%"; height="100%";>
   </div>
</div>

@stop