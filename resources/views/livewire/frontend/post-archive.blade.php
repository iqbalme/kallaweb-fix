<div>
    <div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Publikasi</li>
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
				<div class="col">
					<div class="blog_post_container" style="position:relative;height: auto;">
						@if(isset($data['posts']))
							@foreach($data['posts'] as $post)
								<!-- Blog Post -->
								<div class="blog_post trans_200" style="position:relative;" id="post-{{$loop->iteration}}" data-index="{{$loop->iteration}}">
									@isset($post->thumbnail)
										<a href="{{route('post.single', ['post_val' => $post->slug])}}"><div class="blog_post_image" style="background-image:url('{{asset('storage/images/'.$post->thumbnail)}}');background-size:cover;"></div></a>
									@endisset
									<div class="blog_post_body">
										<div class="blog_post_title"><a href="{{route('post.single', ['post_val' => $post->slug])}}">{{$post->judul}}</a></div>
										<div class="blog_post_meta">
											<ul>
												<li>{{$post->post_user->nama}}</li>
												<li>{{$post->created_at->format('d M Y H:i')}}</li>
											</ul>
										</div>
										<div class="blog_post_text">
											{!!$post->post_excerpt!!}
										</div>
									</div>
								</div>
							@endforeach
						@else
							<div class="col">
								Tidak ada data
							</div>
						@endif
					</div>
				</div>
			</div>
			@if(isset($data['posts']))
			<div class="row">
				<!-- Pagination -->
				{{ $data['posts']->links('vendor.livewire.bootstrap') }}
			</div>
			@endif
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			jQuery(".blog_post_image").height(jQuery(".blog_post_image").width()*0.53);
		});
	</script>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_responsive.css')}}">
</div>
