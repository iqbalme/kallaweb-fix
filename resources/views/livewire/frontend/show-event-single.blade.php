<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li><a href="{{route('event.list')}}">Event</a></li>
								<li>Detail Event</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
    <div class="course">
		<div class="container">
			<div class="row">

				<!-- Course -->
				<div class="col-lg-8">
					
					<div class="course_container">
						<div class="course_title" style="margin-bottom:68px">{{ucfirst($event->nama_event)}}</div>

						<!-- Course Image -->
						<div class="course_image"><img src="{{asset('storage/images/'.$event->gambar_event)}}" alt=""></div>

						<!-- Course Tabs -->
						<div class="course_tabs_container">
							<div class="tabs d-flex flex-row align-items-center justify-content-start">
								<div class="tab active">Deskripsi</div>
							</div>
							<div class="tab_panels">

								<!-- Description -->
								<div class="tab_panel active">
									<div class="tab_panel_title">{{ucfirst($event->nama_event)}}</div>
									<div class="tab_panel_content">
										<div class="tab_panel_text">
										{!! $event->deskripsi_event !!}
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="row mt-2 justify-content-between">
							<div class="col-md-2">&nbsp;</div>
							{{-- @if((time() <= strtotime($event->waktu_mulai)) && (time() <= strtotime($event->waktu_berakhir))) --}}
							{{-- <div class="alert alert-warning" role="alert">
								Event belum mulai
							  </div> --}}
							{{-- @elseif((time() > strtotime($event->waktu_mulai)) && (time() <= strtotime($event->waktu_berakhir))) --}}
								<div class="col-md-5 text-end">
								@if(isset($event->link_daftar))
									<a type="button" class="btn btn-primary" href="{{$event->link_daftar}}" target="blank">BUKA LINK PENDAFTARAN</a>
								{{-- @else --}}
									{{-- <button type="button" class="btn btn-primary" onclick="showEventRegistration()">DAFTAR EVENT</button> --}}
								@endif
								</div>
							{{-- @else --}}
								{{-- <div class="alert alert-danger" role="alert">
								  Event telah berakhir
								</div> --}}
							{{-- @endif --}}
						</div>
						
					</div>
				</div>

				<!-- Course Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Feature -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Informasi Event</div>
							<div class="sidebar_feature">
								<!--div class="course_price">$180</div-->

								<!-- Features -->
								<div class="feature_list">

									<!-- Feature -->
									<div class="feature-event d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title_event"><i class="fa fa-calendar" aria-hidden="true"></i><span>Mulai:</span></div>
										<div class="feature_text ml-auto">{{$event->waktu_mulai->format('d M Y H:i')}}</div>
									</div>

									<div class="feature-event d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title_event_end"><i class="fa fa-calendar" aria-hidden="true"></i><span>Berakhir:</span></div>
										<div class="feature_text ml-auto">{{$event->waktu_berakhir->format('d M Y H:i')}}</div>
									</div>
									
									<!-- Feature -->
									<!--div class="feature-event d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title_event"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Waktu:</span></div>
										<div class="feature_text ml-auto">{{date('H:i', strtotime($event->waktu_mulai))}} - {{date('H:i', strtotime($event->waktu_berakhir))}}</div>
									</div-->

									<!-- Feature -->
									<div class="feature-event d-flex flex-row align-items-center justify-content-start">
										<div class="feature_title_event"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Lokasi:</span></div>
										<div class="feature_text ml-auto">{{$event->lokasi}}</div>
									</div>

								</div>
							</div>
						</div>
						@if($event_lain->count())
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Event Lain</div>
							<div class="sidebar_latest">
								@foreach($event_lain as $event_lain_item)
								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="{{asset('storage/images/'.$event_lain_item->gambar_event)}}" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="{{route('event.show', $event_lain_item->id)}}">{{substr($event_lain_item->nama_event,0,51).'...'}}</a></div>
										<!--div class="latest_price">Free</div-->
									</div>
								</div>
								@endforeach
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="daftarEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <form wire:submit.prevent="daftarEvent">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">REGISTRASI EVENT</h5>
		  </div>
		  <div class="modal-body">
				<div class="col-lg-12">
					<div class="row mb-2">
						<div class="col-lg-4">Nama</div>
						<div class="col-lg-8"><input type="text" class="form-control" wire:model="pendaftar.nama" required></div>
					</div>
					<div class="row mb-2">
						<div class="col-lg-4">Email</div>
						<div class="col-lg-8"><input type="email" class="form-control" wire:model="pendaftar.email" required></div>
					</div>
					<div class="row">
						<div class="col-lg-4">No. HP</div>
						<div class="col-lg-8"><input type="text" class="form-control" maxlength="15" wire:model="pendaftar.no_hp" required></div>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" onclick="closeForm()">BATAL</button>
			<button type="submit" class="btn btn-primary">DAFTAR</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<link href="{{asset('frontend/theme/unicat/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<!-- <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
	<!--link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css"-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course_responsive.css')}}">
	<style>
	.ml-auto, .mx-auto {
		margin-left: auto!important;
	}
	.feature_title_event {
		padding-left: 31px;
	}
	.feature_title_event i {
		position: absolute;
		top: calc(50% - 1px);
		-webkit-transform: translateY(-50%);
		-moz-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		transform: translateY(-50%);
		left: 0;
		font-size: 18px;
		color: #14bdee;
	}
	.feature_title_event_end {
		padding-left: 31px;
	}
	.feature_title_event_end i {
		position: absolute;
		top: calc(50% - 1px);
		-webkit-transform: translateY(-50%);
		-moz-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		transform: translateY(-50%);
		left: 0;
		font-size: 18px;
		color: #ff0000;
	}
	.feature-event:not(:last-child) {
		margin-bottom: 21px;
	}
	</style>	
	<script>
		function showEventRegistration(){
			jQuery("#daftarEvent").modal('show');
		}
		function closeForm(){
			jQuery("#daftarEvent").modal('hide');
		}
		window.addEventListener('closeModal', event => {
			closeForm();
		});
	</script>
</div>