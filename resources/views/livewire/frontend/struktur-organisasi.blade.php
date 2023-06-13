<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Stuktur Organisasi</li>
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
				<img src="{{ asset('storage/images/'.$gambar_struktur) }}">
			</div>
		</div>
	</div>
	<style>
		.struktur {
			padding: 20px 10px;
		}
		.struktur img {
			max-width: -webkit-fill-available;
			width: 100%;
		}
	</style>
</div>
