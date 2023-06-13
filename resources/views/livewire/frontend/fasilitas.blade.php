<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Fasilitas</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	
   <div style="margin-top:40px;margin-bottom:40px;">
		<div class="container">
		<div class="row">
			<!-- Blog Sidebar -->
			<div class="col text-center mb-4">
				<h2>Fasilitas</h2>
			</div>
		</div>
			<div class="row">

				<!-- Blog Sidebar -->
				<div class="col">
				@if($data['fasilitas']->count())
					<!-- Gallery -->
					<!--div class="sidebar_section_title">Instagram</div-->
						<ul class="gallery_items d-flex flex-row align-items-start justify-content-around flex-wrap">
							@foreach($data['fasilitas'] as $fasilitas)
							<li class="gallery_item">
								<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center"><i class="ri-zoom-in-fill"></i></div>
								<a class="colorbox" href="{{asset('storage/images/'.$fasilitas->gambar)}}" title="@if(isset($fasilitas->judul)) {{$fasilitas->judul}} @else {{''}} @endif">
									<img src="{{asset('storage/images/'.$fasilitas->gambar)}}" alt="tes">
								</a>
								<div class="text-center"><strong>@if(isset($fasilitas->judul)) {{$fasilitas->judul}} @else &nbsp @endif</strong></div>
							</li>
							@endforeach
						</ul>
					@else
						Tidak ada data
					@endif
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/remixicon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single_responsive.css')}}">
	<link href="{{asset('frontend/theme/unicat/plugins/colorbox/colorbox.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('frontend/theme/unicat/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
	<script>
	$(document).ready(function()
	{
		"use strict";
		function initColorbox()
		{
			if($('.gallery_item').length)
			{
				$('.colorbox').colorbox(
				{
					rel:'colorbox',
					photo: true,
					maxWidth: '90%'
				});
				$('.gallery_item img').height($('.gallery_item img').width()*0.65);
			}
		}
		initColorbox();
	});
	</script>
</div>
