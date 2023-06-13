<div id="bagian-faq">
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>F A Q</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	
        <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">
        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>
		@if($data['faqs']->count())
		@foreach($data['faqs'] as $faq)
        <div class="row faq-item d-flex align-items-stretch">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>{{$faq->soal}}</h4>
          </div>
          <div class="col-lg-7">
			{!!$faq->jawaban!!}
          </div>
        </div><!-- End F.A.Q Item-->
		@endforeach
		@endif
      </div>
    </section><!-- End Frequently Asked Questions Section -->
	<link href="{{asset('frontend/assets/css/boxicons.css')}}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</div>
