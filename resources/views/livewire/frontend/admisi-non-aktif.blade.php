<div>
	<div style="height:100px">
	</div>
    <div id="notfound">
		<div class="notfound">
			@if(isset($data['gambar_admisi']))
				<img style="max-width:100%;" src="{{ asset('storage/images/'.$data['gambar_admisi']) }}">
			@else
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="a4teks">
				<h1>oops!</h1><br />
				<h2>{{$data['teks_admisi']}}</h2>
			</div>
			@endif
			@if(isset($data['gambar_admisi']))
				<div class="a4button mb-1">
					<a href="http://register.kallabs.ac.id/" target="blank" class="btn btn-primary" style="background-color:#0d6efd;">DAFTAR SEKARANG</a>
				</div>
			@endif
			<div class="a4button">
				<a href="{{route('home')}}">Ke Beranda</a>
			</div>
		</div>
	</div>
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/assets/css/style-not-found-page.css')}}" />
</div>
