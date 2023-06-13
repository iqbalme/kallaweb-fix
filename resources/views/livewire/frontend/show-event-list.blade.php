<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Event</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Events -->
	<section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="section_title">Kalender Event</h2>
                    </header><!-- .heading -->
                </div><!-- .col -->
                @if($data['events']->count())
				@foreach($data['events'] as $event)
                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="{{route('event.show', $event->id)}}"><img src="{{asset('storage/images/'.$event->gambar_event)}}" alt=""></a>
							<div class="posted-date position-absolute">
                                <div class="day">{{$event->waktu_mulai->format('d')}}</div>
                                <div class="month">{{$event->waktu_mulai->format('M')}}</div>
                            </div>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <!--div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->

                                <h2 class="entry-title"><a href="{{route('event.show', $event->id)}}">{{substr($event->nama_event,0,37)}}</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                <div class="event-time-start"><i class="fa fa-calendar"></i>&nbsp;{{$event->waktu_mulai->format('d M Y H:i')}}</div>
								<div class="event-time-end"><i class="fa fa-calendar"></i>&nbsp;{{$event->waktu_berakhir->format('d M Y H:i')}}</div>
								@if(isset($event->lokasi))
								<div class="event-time"><i class="fa fa-map-marker"></i>&nbsp;{{ucfirst($event->lokasi)}}</div>
								@endif
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
								@isset($event->deskripsi)
									<div class="course-author">{{substr($event->deskripsi,0,91).'...'}}</div>
								@endisset
                                <!--div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
				@endforeach
                @endif

            </div><!-- .row -->
			<div class="row">
				<!-- Pagination -->
				{{ $data['events']->links('vendor.livewire.bootstrap') }}
			</div>
        </div><!-- .container -->
    </section>
	<style>
	.flex {
		display: flex !important;
	}
	.featured-courses.horizontal-column .course-thumbnail {
		width: calc(50% - 30px);
		background: #fff;
	}
	.featured-courses.horizontal-column, .featured-courses.vertical-column {
		padding: 100px 0;
		background: #fff;
	}
	.featured-courses.horizontal-column .course-content-wrap {
		width: calc(50% + 30px);
		padding-left: 30px;
		/* border: 1px solid #ebebeb; */
		border-left: 0;
	}
	.course-content-wrap {
		padding: 26px 30px 20px;
		border-top: 0;
		background: #fff;
	}
	.course-thumbnail {
		width: 100%;
		margin: 0;
		object-fit: cover;
	}
	/* .featured-courses.horizontal-column .course-thumbnail img {
		height: 100%;
	} */
	.course-content {
		margin-top: 50px;
		transition: all .35s;
		border: 1px solid #ebebeb;
	}
	.course-thumbnail img {
		display: block;
		width: 100%;
		object-fit: cover;
	}
	.course-content .entry-title a {
		color: #383749;
	}
	.course-content .entry-title {
		margin: 0;
		font-size: 20px;
		line-height: 1.3;
		font-weight: 400;
	}
	.course-content .entry-meta {
		margin-top: 12px;
	}
	img {
		vertical-align: baseline;
	}
	.event-time {
		width:100%;
		margin-top: 8px;
		font-size: 14px;
		text-transform: uppercase;
		color: #c0c1cd;
	}
	.event-time .fa {
		margin-right: 6px;
		color: #34d986;
	}
	.event-time-start .fa {
		margin-right: 6px;
		color: #34d986;
	}
	.event-time-end .fa {
		margin-right: 6px;
		color: #ff0000;
	}
	.posted-date {
		bottom: 0;
		left: 0;
		padding: 10px 16px;
		background: #f3a90b;
		color: #fff;
		line-height: 1;
		text-align: center;
	}
	.position-absolute {
		position: absolute!important;
	}
	</style>
	<!--link href="{{asset('frontend/assets/css/kalla-style.css')}}" rel="stylesheet" type="text/css"-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/theme/unicat/styles/course_responsive.css')}}">
	<script>
		jQuery( document ).ready(function() {
			jQuery(".course-thumbnail img").height(jQuery(".course-thumbnail img").width());
		});
	</script>
</div>
