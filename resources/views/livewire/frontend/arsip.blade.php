<div>
    <div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>{{$meta['value']}}</li>
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
										@if($data['is_seo_post'])
											<a href="{{route('post.single', ['post_val' => $post->slug])}}"><div class="blog_post_image" style="background-image:url('{{asset('storage/images/'.$post->thumbnail)}}');background-size:cover;"></div></a>
										@else
											<a href="{{route('post.single', ['post_val' => $post->id])}}"><div class="blog_post_image" style="background-image:url('{{asset('storage/images/'.$post->thumbnail)}}');background-size:cover;"></div></a>
										@endif
									@endisset
									<div class="blog_post_body">
										<div class="blog_post_title">
											@if($data['is_seo_post'])
												<a href="{{route('post.single', ['post_val' => $post->slug])}}">{{$post->judul}}</a>
											@else												
												<a href="{{route('post.single', ['post_val' => $post->id])}}">{{$post->judul}}</a>
											@endif
										</div>
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

						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Pagination -->
                {{-- @if(count($data['posts']))
				    {{ $data['posts']->links('vendor.livewire.bootstrap') }}
                @endif --}}
			</div>
		</div>
	</div>
	<style>
		.blog_post_container {
			display: flex;
			flex-wrap: wrap;
			gap: 10px 30px;
		}
		.blog_post {
			display: flex;
			flex-direction: column;
			flex-grow: 1;
			/* width: calc((100% - 60px) / 3); */
			border-radius: 6px;
			overflow: hidden;
			box-shadow: 0px 1px 10px rgb(29 34 47 / 10%);
			margin-bottom: 30px;
		}
		.blog_post_meta ul {
			padding-left: 0px;
		}
	</style>
	<script>
		jQuery( document ).ready(function() {
			jQuery(".blog_post_image").height(jQuery(".blog_post_image").width()*0.53);
		});
	</script>
	<!--link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css"-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/blog_responsive.css')}}">
</div>
