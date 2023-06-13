<div>
@if(count($data['testimonis']))
	<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Testimoni</h2>
					</div>
				</div>
			</div>
		<section class="testimonial-section" style="padding-top:30px;">
        <!-- Swiper -->
        <div class="swiper-container testimonial-slider swiper-container-fade swiper-container-horizontal swiper-container-wp8-horizontal">
            <div class="swiper-wrapper" style="transition-duration: 0ms;">
				@foreach($data['testimonis'] as $testimoni)
				@php
				
				@endphp
				<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="{{$loop->iteration}}" style="width: 778px; opacity: 1; transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 flex order-2 order-lg-1 align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
									@if($loop->index == 0)
										<img src="{{asset('storage/images/'.$data['testimonis'][1]->gambar)}}" alt="">
									@elseif($loop->index == 1)
										@if(count($data['testimonis']) > 2)
											<img src="{{asset('storage/images/'.$data['testimonis'][2]->gambar)}}" alt="">
										@endif
									@else
										<img src="{{asset('storage/images/'.$data['testimonis'][0]->gambar)}}" alt="">
									@endif
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>{{substr($testimoni->deskripsi,0,140)}}</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">{{$testimoni->nama}} - <span>{{$testimoni->keterangan}}</span></h3>
                                </div><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div>
			@endforeach
             	
			</div><!-- .swiper-wrapper -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                        <div class="swiper-pagination position-relative flex justify-content-center align-items-center swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .testimonial-slider -->
    </section>
	<!-- Swiper CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.css" integrity="sha512-wbWvHguVvzF+YVRdi8jOHFkXFpg7Pabs9NxwNJjEEOjiaEgjoLn6j5+rPzEqIwIroYUMxQTQahy+te87XQStuA==" crossorigin="anonymous" referrerpolicy="no-referrer" />	
    <!-- <link rel="stylesheet" href="{{asset('frontend/assets/css/style-ezuca.css')}}"> -->
	<!-- <script type="text/javascript" src="{{asset('frontend/assets/js/jquery.js')}}"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.js" integrity="sha512-k2o1KZdvUi59PUXirfThShW9Gdwtk+jVYum6t7RmyCNAVyF9ozijFpvLEWmpgqkHuqSWpflsLf5+PEW6Lxy/wA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- <script type="text/javascript" src="{{asset('frontend/assets/js/masonry.pkgd.min.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{asset('frontend/assets/js/jquery.collapsible.min.js')}}"></script> -->
	<script type="text/javascript" src="{{asset('frontend/assets/js/custom-ezuca.js')}}"></script>
	<style>
		.testimonial-slider .content-wrap {
			min-height: 140px;
		}
	</style>
@endif
</div>
