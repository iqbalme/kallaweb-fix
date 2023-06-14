<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Informasi Beasiswa</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row justify-align-center">
			<div class="col beasiswa">
				@isset($info_beasiswa_img)
					{{-- <img src="{{asset('frontend/assets/images/beasiswa.jpg')}}"> --}}
					<img src="{{ asset('storage/images/'.$info_beasiswa_img) }}">
				@endisset
			</div>
		</div>
	</div>
	<style>
		.beasiswa {
			padding: 20px 10px;
		}
		.beasiswa img {
			width: 100%;
			max-width: 100%;
			/* max-width: -webkit-fill-available; */
		}
	</style>
</div>
