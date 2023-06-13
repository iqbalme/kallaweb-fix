<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li><a href="{{route('post.list')}}">Publikasi</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="blog">
		<div class="container">
			<div class="row">
				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title">{{ucfirst($post->judul)}}</div>
						<div class="blog_meta">
							<ul>
								<li>Dipublikasikan pada {{date('d M Y', strtotime($post->created_at))}}</li>
								<li>Oleh: {{$post->post_user->nama}}</li>
							</ul>
						</div>
                    <div>
                        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=639df90de6edea00197b1823&product=image-share-buttons&source=platform" async="async"></script>
                    </div>
						@isset($post->thumbnail)
							<div class="blog_image"><img src="{{asset('storage/images/'.$post->thumbnail)}}" alt=""></div>
						@endisset
						{!!$post->konten!!}
					</div>
					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						@if(count($post->post_tags))
						<div class="blog_tags">
							<span>Tags: </span>
							<ul>
								@foreach($tags as $tag)
								<li><a href="{{route('arsip', ['meta_type' => 'tag', 'meta_val' => $tag->id])}}">{{$tag->nama_tag}}</a>, </li>
								@endforeach
							</ul>
						</div>
						<!--div class="blog_social ml-lg-auto">
							<span>Share: </span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div-->
						@endif
					</div>
				</div>

				<!-- Blog Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Categories -->
						@if($data['categories']->count())
						<div class="sidebar_section">
							<div class="sidebar_section_title">Kategori</div>
							<div class="sidebar_categories">
								<ul class="categories_list">
									@foreach($data['categories'] as $category)
									<li><a href="{{route('arsip', ['meta_type' => 'kategori', 'meta_val' => $category->slug])}}" class="clearfix">{{strtoupper($category->nama_kategori)}}<span>
                                        @if($this->initial_data_req['is_main_domain'])
                                            ({{$category->post_category->count()}})
                                        @endif
                                    </span></a></li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif

						<!-- Latest News -->
						@if($data['post_lain']->count())
						<div class="sidebar_section">
							<div class="sidebar_section_title">Berita Lainnya</div>
							<div class="sidebar_latest">
								@foreach($data['post_lain'] as $post_lain)
								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="{{asset('storage/images/'.$post_lain->thumbnail)}}" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title">
										@if($data['setting_slug']->isi_setting)
											<a href="{{route('post.single', ['post_val' => $post_lain->slug])}}">
										@else
											<a href="{{route('post.single', ['post_val' => $post_lain->id])}}">
										@endif
										{{$post_lain->judul}}</a></div>
										<div class="latest_date">{{$post_lain->created_at->format('d M Y H:i')}}</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						@endif

						<!-- Gallery -->
						<!--div class="sidebar_section">
							<div class="sidebar_section_title">Instagram</div>
							<div class="sidebar_gallery">
								<ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_1_large.jpg">
											<img src="images/gallery_1.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_2_large.jpg">
											<img src="images/gallery_2.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_3_large.jpg">
											<img src="images/gallery_3.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_4_large.jpg">
											<img src="images/gallery_4.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_5_large.jpg">
											<img src="images/gallery_5.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox cboxElement" href="images/gallery_6_large.jpg">
											<img src="images/gallery_6.jpg" alt="">
										</a>
									</li>
								</ul>
							</div>
						</div-->

						<!-- Tags -->
						@if(count($post->post_tags))
						<div class="sidebar_section">
							<div class="sidebar_section_title">Tags</div>
							<div class="sidebar_tags">
								<ul class="tags_list">
									@foreach($tags as $tag)
									<li><a href="{{route('arsip', ['meta_type' => 'tag', 'meta_val' => $tag->id])}}">{{$tag->nama_tag}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_single_responsive.css')}}">
	<style>
	.blog_meta ul {
		list-style: none;
		padding: 0;
	}
	.sidebar_categories ul {
		padding: 0;
	}
	.blog_content img {
		max-width: -webkit-fill-available;
	}
	</style>
	<!-- <script src="{{asset('frontend/theme/unicat/js/jquery-3.2.1.min.js')}}"></script> -->
	<script>
	jQuery( document ).ready(function() {
		$.getScript("{{asset('frontend/theme/unicat/plugins/colorbox/jquery.colorbox-min.js')}}");
		//$.getScript("{asset('frontend/theme/unicat/js/jquery-3.2.1.min.js')}}");
		$.getScript("{{asset('frontend/theme/unicat/js/blog_single.js')}}");
	});
	// jQuery( document ).ready(function() {
			// jQuery(".blog_content img").css("maxWidth", jQuery(".blog_content").width());
		// });
	</script>
</div>
