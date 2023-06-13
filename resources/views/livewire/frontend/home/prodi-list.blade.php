<div>
	@if(isset($data['prodis']))
    <div class="prodi">
		<div class="container overflow-hidden">
			<div class="row justify-content-between">

					<!--div class="blog_prodi_container" style="position:relative;height:auto;"-->
					<!--div class="col-lg-6"-->
							@foreach($data['prodis'] as $prodi)
								@if($prodi->id != 1)
									<!--div class="blog_prodi trans_200" style="position:relative;" id="post-{{$loop->iteration}}" data-index="{{$loop->iteration}}"-->
									<div class="col-lg-3 col-md-6 col-sm-12 col-12 trans_200 p-2">
										<div class="blog_prodi_list">
											@isset($prodi->thumbnail)
												<a href="{{'https://'.$prodi->subdomain.'.'.config('app.url')}}"><div class="blog_prodi_image" style="background-image:url('{{asset('storage/images/'.$prodi->thumbnail)}}');background-size:cover;"></div></a>
											@endisset
											<div class="blog_post_body">
												<div class="blog_post_title text-center"><a href="{{'https://'.$prodi->subdomain.'.'.config('app.url')}}">{{$prodi->nama_prodi}}</a></div>
												<div class="blog_post_text">
												{{substr($prodi->deskripsi_prodi,0,77).'...'}}
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
					<!--/div-->

			</div>
		</div>
	</div>
	<script>
		jQuery( document ).ready(function() {
			// jQuery(".blog_prodi_image").height(jQuery(".blog_prodi").width());
			jQuery(".blog_prodi_image").height(jQuery(".blog_prodi_list").width()*0.53);
		});
	</script>
	<!--link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css"-->
	@endisset
</div>
