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
	<div id="bagian-faq">
    <section id="faq" class="faq">
      <div class="container">
        <div class="section-title">
          <h2>Profil Dosen</h2>
          <p>{{$data->nama}}</p>
        </div>
        <div class="row">
			<div class="col-lg-3 gambar-dosen">
				<img src="{{asset('storage/images/'.$data->gambar)}}">
			</div>
			<div class="col-lg-9 deskripsi-dosen">
			{!!$data->deskripsi!!}
			<br />
			<hr>
			<strong>Kontak:</strong>
			@if(count(unserialize($data->media_sosial)))
                <div class="social">
					@foreach(unserialize($data->media_sosial) as $key => $medsos)
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
	</section>
	</div>
	<link href="{{asset('frontend/assets/css/remixicon.css')}}" rel="stylesheet">
	<style>
		.gambar-dosen img {
			max-width: 90%;
		}
		.deskripsi-dosen .social a i {
			color: black;
			font-size: 30px;
		}

		.deskripsi-dosen .social a:hover i {
			color: red;
			font-size: 30px;
		}
	<style>
</div>
