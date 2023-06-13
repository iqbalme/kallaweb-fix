<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Registrasi Ulang</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row justify-align-center">
			<div class="col regulang">
				@isset($registrasi_ulang_img)
				{{-- <a href="https://bit.ly/RegulKallaInstitute23" target="blank"><img src="{{asset('frontend/assets/images/registrasi-ulang.jpg')}}"></a> --}}
					@if(isset($registrasi_ulang_link))
						<a href="{{$registrasi_ulang_link}}" target="blank">
							<img src="{{ asset('storage/images/'.$registrasi_ulang_img) }}">
						</a>
					@else
						<img src="{{ asset('storage/images/'.$registrasi_ulang_img) }}">
					@endif
				@endisset
			</div>
		</div>
	</div>
	<style>
		.regulang {
			padding: 20px 10px;
		}
		.regulang img {
			width: 100%;
			max-width: 100%;
			/* max-width: -webkit-fill-available; */
		}
	</style>
</div>
