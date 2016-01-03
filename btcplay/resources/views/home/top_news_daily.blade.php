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
            Bitcoin, Blockchain, Altcoins and Cryptocurrencies
            </em>
            <i class="icon- icon-bullhorn top-news-icon"></i>                             
            </a>
         </div>
         @foreach($top_news_daily['responseData']['results'] as $news)
         <div class="news-blocks">
            <h3><a href="#">Google Glass Technology..</a></h3>
            <div class="news-block-tags">
               <strong>CA, USA</strong>
               <em></em>
            </div>
            <p><img class="news-block-img pull-right" src="assets/img/gallery/image1.jpg" alt="">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            <a href="/index.php/{{ $news[''] }}" class="news-block-btn">
            Read more
            <i class="m-icon-swapright m-icon-black"></i>                              
            </a>                          
         </div>
         @endforeach
</div>