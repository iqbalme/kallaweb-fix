<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Biaya Kuliah</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row justify-align-center">
			<div class="col struktur">
				@isset($biaya_kuliah_img)
					{{-- <img src="{{asset('frontend/assets/images/biaya-kuliah.jpg')}}"> --}}
					<img src="{{ asset('storage/images/'.$biaya_kuliah_img) }}">
				@endisset
			</div>
		</div>
	</div>
	<style>
		.struktur {
			padding: 20px 10px;
		}
		.struktur img {
			width: 100%;
			max-width: 100%;
			/* max-width: -webkit-fill-available; */
		}
	</style>
</div>
