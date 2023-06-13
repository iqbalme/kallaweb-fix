<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Profil Dosen</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <section id="team" class="team ">
      <div class="container">

        <div class="row">
		@if($teams->count())
          @foreach($teams as $team)
          <div class="col-lg-6 mt-4">
            <div class="card">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{asset('storage/images/'.$team->gambar)}}" class="img-fluid" alt="" style="height:140px;width:140px;"></div>
              <div class="member-info">
                <a href="{{route('team.detail', ['team_id' => $team->id])}}"><h4>{{$team->nama}}</h4></a>
                <span>{{$team->jabatan}}</span>
                <!--p>Dolorum tempora officiis odit laborum officiis</p-->
				@if(count(unserialize($team->media_sosial)))
                <div class="social">
					@foreach(unserialize($team->media_sosial) as $key => $medsos)
						@if($key == 'facebook')
						  <a href="{{'https://facebook.com/'.$medsos}}" target="blank"><i class="ri-facebook-fill"></i></a>
						@endif
						@if($key == 'instagram')
						  <a href="{{'https://instagram.com/'.$medsos}}" target="blank"><i class="ri-instagram-fill"></i></a>
						@endif
						@if($key == 'linkedin')
						  <a href="{{'https://linkedin.com/in/'.$medsos}}" target="blank"> <i class="ri-linkedin-box-fill"></i> </a>
						@endif
						@if($key == 'email')
						  <a href="{{'mailto:'.$medsos}}" target="blank"><i class="ri-mail-fill"></i> </a>
						@endif
				  @endforeach
                </div>
				@endif
              </div>
            </div>
            </div>
          </div>
		  @endforeach
		@endif
        </div>

      </div>
    </section>
	<link href="{{asset('frontend/assets/css/remixicon.css')}}" rel="stylesheet">
	<style>
	section {
		padding: 60px 0;
		overflow: hidden;
	}
	</style>
</div>
