@php
	$status_pendaftaran = (bool) $data['status_pendaftaran'];
@endphp
@if($status_pendaftaran)
	<!-- Newsletter -->
	@if(request()->route()->getName() != 'registrasi')
	<div class="newsletter">
		<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="{{asset('frontend/assets/images/newsletter2.jpg')}}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-between">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">Registrasi Sekarang Juga</div>
							<!--div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div-->
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto text-end">
							<a  href="{{route('registrasi')}}">
								<button type="button" class="newsletter_button">DAFTAR</button>
								</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
@endisset

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_background" style="background-image:url({{asset('frontend/theme/unicat/images/footer_background.png')}})"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">

							<div class="col-lg-3 footer_col">

								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
                                        @if(Request()->request->all()['is_main_domain'])
                                            <a href="{{route('home')}}">
                                                <div class="footer_logo_text"><img src="{{ asset('storage/images/'.$data['web_logo']) }}"></div>
                                            </a>
                                        @else
                                            <a href="{{route('home')}}">
                                                <div class="footer_logo_text"><img src="{{ asset('storage/images/'.Request()->request->all()['subdomain']['logo_prodi']) }}"></div>
                                            </a>
                                        @endif
									</div>
									<div class="footer_about_text">
										<p>{{$data['web_description']}}</p>
									</div>
									<div class="footer_social">
										<ul>
											<li><a href="{{'https://facebook.com/'.$data['facebook']}}" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="{{'https://youtube.com/'.$data['youtube']}}" target="blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
											<li><a href="{{'https://instagram.com/'.$data['instagram']}}" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="{{'https://twitter.com/'.$data['twitter']}}" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>

							</div>

							<div class="col-lg-3 footer_col">

								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">Hubungi Kami</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email: {{$data['email']}}</li>
											<li>Phone: {{$data['no_kontak']}}</li>
											<li>{{$data['alamat']}}</li>
										</ul>
									</div>
								</div>

							</div>

							<div class="col-lg-3 footer_col">

								<!-- Footer links -->
								<div class="footer_section footer_links">
									<div class="footer_title">Halaman</div>
									<div class="footer_links_container">
										<ul>
											<li><a href="{{route('home')}}">Beranda</a></li>
											<li><a href="{{route('struktur')}}">Struktur</a></li>
											<li><a href="{{route('kontak')}}">Kontak</a></li>
											<li><a href="{{route('fasilitas.show')}}">Fasilitas</a></li>
											<li><a href="{{route('post.list')}}">Berita</a></li>
											<li><a href="{{route('event.list')}}">Event</a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row copyright_row">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-between">
						<div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="ml-lg-auto cr_links">
							Created by <a href="https://mediadatait.com/" target="_blank" style="color:#fff;">MediaDataIT (MI)</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<style>
	.footer_logo_text img {
		max-width: 261px;
	}
	</style>
