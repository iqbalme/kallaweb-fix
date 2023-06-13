<div>
    @if($data['highlights']->count())
	<section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section text-white" style="background-image: url({{asset('frontend/assets/images/slider_2.jpg')}});background-size: cover;">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" style="margin-bottom:0px;">
              <h2 class="mb0">HIGHLIGHTS</h2>
            </div>
          </div>
        </div>
      </section>

      <section class="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
              <div class="tab-content">

                <div id="featured-news" class="tab-pane fade in active">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="owl-carousel" id="owl1">
                        @foreach($data['highlights'] as $news)
						<div class="item">
                          <a href="#" class="probootstrap-featured-news-box">
							@if(isset($news->thumbnail))
								<figure class="probootstrap-media"><img src="{{ asset('storage/images/'.$news->thumbnail)}}" alt="{{$news->judul}}" class="img-responsive"></figure>
							@else
								<figure class="probootstrap-media"><img src="{{ asset('admin/thumbnail-default.jpg')}}" alt="{{$news->judul}}" class="img-responsive"></figure>
							@endif
                            <div class="probootstrap-text">
                              <h3>{{ucfirst($news->judul)}}</h3>
                              <p>{{ ucfirst(substr($news->post_excerpt, 0, 85)).'...' }}</p>
                              <span class="probootstrap-date"><i class="icon-calendar"></i>{{date('H:i', strtotime($news->created_at))}}</span>
                              
                            </div>
                          </a>
                        </div>
                        <!-- END item -->
						@endforeach
                      </div>
                    </div>
                  </div>
                  <!-- END row -->
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p><a href="#" class="btn btn-primary">Lihat Selengkapnya</a></p>  
                    </div>
                  </div>
                </div>

              </div>
            
            </div>
          </div>
        </div>
      </section>
	  @endif
</div>
