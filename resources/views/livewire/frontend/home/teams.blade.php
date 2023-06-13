<div>
	@if(count($data['teams']))
    <section class="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
              <h2>TIM PENGAJAR</h2>
              <p class="lead">Perpaduan antara akademisi dan praktisi kewirausahaan dan Manager/Direksi Kalla Group</p>
            </div>
          </div>
          <!-- END row -->

          <div class="row">
			@foreach($data['teams'] as $team)
            <div class="col-md-3 col-sm-6">
              <div class="probootstrap-teacher text-center probootstrap-animate">
                <figure class="media">
                  <img src="{{asset('storage/images/'.$team->gambar)}}" alt="{{$team->nama}}" class="img-responsive">
                </figure>
                <div class="text">
                  <h3>{{$team->nama}}</h3>
                  <p>{{$team->jabatan}}</p>
				  @isset($team->media_sosial)
                  <ul class="probootstrap-footer-social">
					@foreach(unserialize($team->media_sosial) as $key => $medsos)
						@if($key == 'facebook')
							<li class="facebook"><a href="{{'https://facebook.com/'.$medsos}}" target="_blank"><i class="icon-facebook2"></i></a></li>
						@endif
						@if($key == 'instagram')
						<li class="instagram"><a href="{{'https://instagram.com/'.$medsos}}" target="_blank"><i class="icon-instagram2"></i></a></li>
						@endif
						@if($key == 'linkedin')
						<li class="google-plus"><a href="{{'https://linkedin.com/in/'.$medsos}}" target="_blank"><i class="icon-linkedin"></i></a></li>
						@endif
						@if($key == 'email')
							<li class="google-plus"><a href="{{'mailto:'.$medsos}}" target="_blank"><i class="icon-mail"></i></a></li>
						@endif
					@endforeach
                  </ul>
				  @endisset
                </div>
              </div>
            </div>
			@endforeach
            <div class="clearfix visible-sm-block visible-xs-block"></div>
          </div>

        </div>
      </section>
	@endif
</div>