<div>
<!-- Header -->
	<div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
	<header class="header site-navbar">

		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div>{{$data['no_kontak']}}</div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div>{{$data['email']}}</div>
									</li>
								</ul>
								<!--div class="top_bar_login ml-auto">
									<div class="login_button"><a href="{{route('registrasi')}}">Register</a></div>
								</div-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_container">
		<div class="container">
        <div class="row-nav align-items-center">

          <div class="col-11 col-xl-2">
            <div class="mb-0 site-logo">
                @if(Request()->request->all()['is_main_domain'])
                    <a href="{{route('home')}}" class="text-white mb-0">
                        <img src="{{ asset('storage/images/'.$data['web_logo']) }}">
                    </a>
                @else
                    <a href="{{route('home')}}" class="text-white mb-0">
                        <img src="{{ asset('storage/images/'.Request()->request->all()['subdomain']['logo_prodi']) }}">
                    </a>
                @endif
            </div>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation-nav position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="@if(request()->route()->getName() == 'home') active @else &nbsp; @endif"><a href="{{route('home')}}"><span>Beranda</span></a></li>
				<li class="has-children @if((request()->route()->getName() == 'struktur')||(request()->route()->getName() == 'team.show')||(request()->route()->getName() == 'galeri.show')||(request()->route()->getName() == 'team.detail')||(request()->route()->getName() == 'tentang-kampus')) active @else &nbsp; @endif"><a href="#"><span>Profil</span></a>
					<ul class="dropdown arrow-top">
                    @if(Request()->request->all()['is_main_domain'])
                        <li><a href="{{route('tentang-kampus')}}">Tentang Kampus</a></li>
                    @else
                        <li><a href="{{route('tentang-kampus')}}">Tentang Prodi</a></li>
                    @endif
                    <li><a href="{{route('struktur')}}">Struktur Organisasi</a></li>
                    <li><a href="{{route('team.show')}}">Profil Dosen</a></li>
					@if(!Request()->request->all()['is_main_domain'])
						<li><a href="{{route('kurikulum')}}">Kurikulum</a></li>
					@endif
                    @if(Request()->request->all()['is_main_domain'])
                        <li><a href="{{route('fasilitas.show')}}">Fasilitas</a></li>
                    @endif
                  </ul>
				</li>
                @if(Request()->request->all()['is_main_domain'])
                    @isset($data['prodis'])
                        <li class="has-children"><a href="#"><span>Program Studi</span></a>
                            <ul class="dropdown arrow-top">
                                @foreach($data['prodis'] as $prodi)
                                    @if($prodi->id != 1)
                                        <li><a href="{{'https://'.$prodi->subdomain.'.'.config('app.url')}}">{{$prodi->nama_prodi}}</a></li>
                                    @endif
                                @endforeach
                        </ul>
                        </li>
                    @endisset
                @endif
				<li class="has-children @if((request()->route()->getName() == 'post.list')||(request()->route()->getName() == 'event.list')||(request()->route()->getName() == 'faq')) active @else &nbsp; @endif"><a href="#"><span>Informasi</span></a>
					<ul class="dropdown arrow-top">
                    <li><a href="{{route('post.list')}}">Berita & Artikel</a></li>
                    <li><a href="{{route('event.list')}}">Event</a></li>
                    @if(Request()->request->all()['is_main_domain'])
                        <li><a href="{{route('pengumuman')}}">Pengumuman</a></li>
                    @endif
                    <li><a href="{{route('faq')}}">F A Q</a></li>
                  </ul>
				</li>
                @if(Request()->request->all()['is_main_domain'])
                    <li class="has-children @if((request()->route()->getName() == 'registrasi')) active @else &nbsp; @endif"><a href="#"><span>Admisi</span></a>
                        <ul class="dropdown arrow-top">
                        <li><a href="{{route('registrasi')}}">Pendaftaran Mahasiswa Baru</a></li>
                        <li><a href="{{route('biaya.kuliah')}}">Biaya Kuliah</a></li>
                        <li><a href="{{route('info.beasiswa')}}">Informasi Beasiswa</a></li>
                        <li><a href="{{route('registrasi.ulang')}}">Registrasi Ulang</a></li>
                    </ul>
                    </li>
                @endif
				<li class="@if(request()->route()->getName() == 'kontak') active @else &nbsp; @endif"><a href="{{route('kontak')}}"><span>Kontak</span></a></li>
              </ul>
            </nav>
          </div>
			<!--div class="navbar-header">
			  <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-menu h3"></span>
			  </a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li>
				<li><a href="#">Page 3</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			  </ul>
			</div-->
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
	</header>
	<style>
	a {
	  -webkit-transition: .3s all ease;
	  -o-transition: .3s all ease;
	  transition: .3s all ease; }
	  a, a:hover {
		text-decoration: none !important; }

	.site-navbar {
	  margin-bottom: 0px;
	  z-index: 1999;
	  position: absolute;
	  /* top: 2rem; */
	  width: 100%; }
	  .site-navbar.transparent {
		background: transparent; }
	  .site-navbar.absolute {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%; }
	  .site-navbar .site-logo {
		position: relative;
		left: 0; }
	  .site-navbar .site-logo img { max-height:56px; padding: 5px 0 1px 0; }
	  .site-navbar .site-navigation-nav .site-menu {
		margin-bottom: 0; }
		.site-navbar .site-navigation-nav .site-menu .active > a span {
		  background: #007F3D;
		  color: #fff;
		  border-radius: 30px;
		  display: inline-block;
		  padding: 5px 20px; }
		.site-navbar .site-navigation-nav .site-menu a {
		  text-decoration: none !important;
		  display: inline-block; }
		.site-navbar .site-navigation-nav .site-menu > li {
		  display: inline-block; }
		  .site-navbar .site-navigation-nav .site-menu > li > a {
			padding: 10px 0px;
			color: #384158;
			font-size: 16px;
			text-decoration: none !important; }
			.site-navbar .site-navigation-nav .site-menu > li > a > span {
			  padding: 5px 20px;
			  display: inline-block;
			  -webkit-transition: .3s all ease;
			  -o-transition: .3s all ease;
			  transition: .3s all ease;
			  border-radius: 30px; }
			.site-navbar .site-navigation-nav .site-menu > li > a:hover > span {
			  background: #007F3D;
			  color: #fff;
			  border-radius: 30px;
			  display: inline-block; }
		.site-navbar .site-navigation-nav .site-menu .has-children {
		  position: relative; }
		  .site-navbar .site-navigation-nav .site-menu .has-children > a span {
			position: relative;
			padding-right: 30px; }
			.site-navbar .site-navigation-nav .site-menu .has-children > a span:before {
			  position: absolute;
			  content: "\e313";
			  font-size: 16px;
			  top: 50%;
			  right: 10px;
			  -webkit-transform: translateY(-50%);
			  -ms-transform: translateY(-50%);
			  transform: translateY(-50%);
			  font-family: 'icomoon'; }
		  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown {
			visibility: hidden;
			opacity: 0;
			top: 100%;
			position: absolute;
			text-align: left;
			border-top: 2px solid #007F3D;
			-webkit-box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
			box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
			padding: 0px 0;
			margin-top: 20px;
			margin-left: 0px;
			background: #fff;
			-webkit-transition: 0.2s 0s;
			-o-transition: 0.2s 0s;
			transition: 0.2s 0s; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top {
			  position: absolute; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top:before {
				bottom: 100%;
				left: 20%;
				border: solid transparent;
				content: " ";
				height: 0;
				width: 0;
				position: absolute;
				pointer-events: none; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown.arrow-top:before {
				border-color: rgba(136, 183, 213, 0);
				border-bottom-color: #fff;
				border-width: 10px;
				margin-left: -10px; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown a {
			  text-transform: none;
			  letter-spacing: normal;
			  -webkit-transition: 0s all;
			  -o-transition: 0s all;
			  transition: 0s all;
			  color: #343a40; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown .active > a {
			  color: #007F3D !important; }
			.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li {
			  list-style: none;
			  padding: 0;
			  margin: 0;
			  min-width: 200px; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li > a {
				padding: 9px 20px;
				display: block; }
				.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li > a:hover {
				  background: #fafafb; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > a {
				position: relative; }
				.site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > a:after {
				  position: absolute;
				  right: 0;
				  content: "\e315";
				  right: 20px;
				  font-family: 'icomoon'; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children > ul {
				left: 100%;
				top: 0; }
			  .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:hover > a, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:active > a, .site-navbar .site-navigation-nav .site-menu .has-children .dropdown > li.has-children:focus > a {
				background: #fafafb; }
		  .site-navbar .site-navigation-nav .site-menu .has-children:hover > a, .site-navbar .site-navigation-nav .site-menu .has-children:focus > a, .site-navbar .site-navigation-nav .site-menu .has-children:active > a {
			color: #007F3D; }
			.site-navbar .site-navigation-nav .site-menu .has-children:hover > a span, .site-navbar .site-navigation-nav .site-menu .has-children:focus > a span, .site-navbar .site-navigation-nav .site-menu .has-children:active > a span {
			  background: #007F3D;
			  color: #fff; }
		  .site-navbar .site-navigation-nav .site-menu .has-children:hover, .site-navbar .site-navigation-nav .site-menu .has-children:focus, .site-navbar .site-navigation-nav .site-menu .has-children:active {
			cursor: pointer; }
			.site-navbar .site-navigation-nav .site-menu .has-children:hover > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children:focus > .dropdown, .site-navbar .site-navigation-nav .site-menu .has-children:active > .dropdown {
			  -webkit-transition-delay: 0s;
			  -o-transition-delay: 0s;
			  transition-delay: 0s;
			  margin-top: 0px;
			  visibility: visible;
			  opacity: 1; }

	.site-mobile-menu {
	  width: 300px;
	  position: fixed;
	  right: 0;
	  z-index: 2000;
	  padding-top: 20px;
	  background: #f1f1f1;
	  height: calc(100vh);
	  -webkit-transform: translateX(110%);
	  -ms-transform: translateX(110%);
	  transform: translateX(110%);
	  -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
	  box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
	  -webkit-transition: .3s all ease-in-out;
	  -o-transition: .3s all ease-in-out;
	  transition: .3s all ease-in-out; }
	  .offcanvas-menu .site-mobile-menu {
		-webkit-transform: translateX(0%);
		-ms-transform: translateX(0%);
		transform: translateX(0%); }
	  .site-mobile-menu .site-mobile-menu-header {
		width: 100%;
		float: left;
		padding-left: 20px;
		padding-right: 20px; }
		.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
		  float: right;
		  margin-top: 8px; }
		  .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
			font-size: 30px;
			display: inline-block;
			padding-left: 10px;
			padding-right: 0px;
			line-height: 1;
			cursor: pointer;
			-webkit-transition: .3s all ease;
			-o-transition: .3s all ease;
			transition: .3s all ease; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
			  color: #f8f9fa; }
		.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
		  float: left;
		  margin-top: 10px;
		  margin-left: 0px; }
		  .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
			display: inline-block;
			text-transform: uppercase; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
			  max-width: 70px; }
			.site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
			  text-decoration: none; }
	  .site-mobile-menu .site-mobile-menu-body {
		overflow-y: scroll;
		-webkit-overflow-scrolling: touch;
		position: relative;
		padding: 0 20px 20px 20px;
		height: calc(100vh - 52px);
		padding-bottom: 150px; }
	  .site-mobile-menu .site-nav-wrap {
		padding: 0;
		margin: 0;
		list-style: none;
		position: relative; }
		.site-mobile-menu .site-nav-wrap a {
		  padding: 10px 20px;
		  display: block;
		  position: relative;
		  color: #212529; }
		  .site-mobile-menu .site-nav-wrap a:hover {
			color: #fff;
			background-color: #e77100;
			border-radius: 20px; }
		.site-mobile-menu .site-nav-wrap li {
		  position: relative;
		  display: block; }
		  .site-mobile-menu .site-nav-wrap li.active > a {
			    color: #fff;
				background-color: #007F3D;
				border-radius: 20px; }
		.site-mobile-menu .site-nav-wrap .arrow-collapse {
		  position: absolute;
		  right: 0px;
		  top: 10px;
		  z-index: 20;
		  width: 36px;
		  height: 36px;
		  text-align: center;
		  cursor: pointer;
		  border-radius: 50%;
		  margin-right: 10px;
		  background-color: #fff; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
			background: #f8f9fa; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
			font-size: 12px;
			z-index: 20;
			font-family: "icomoon";
			content: "\f078";
			position: absolute;
			top: 50%;
			left: 50%;
			-webkit-transform: translate(-50%, -50%) rotate(-180deg);
			-ms-transform: translate(-50%, -50%) rotate(-180deg);
			transform: translate(-50%, -50%) rotate(-180deg);
			-webkit-transition: .3s all ease;
			-o-transition: .3s all ease;
			transition: .3s all ease; }
		  .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%); }
		.site-mobile-menu .site-nav-wrap > li {
		  display: block;
		  position: relative;
		  float: left;
		  width: 100%; }
		  .site-mobile-menu .site-nav-wrap > li > a {
			padding-left: 20px;
			font-size: 20px; }
		  .site-mobile-menu .site-nav-wrap > li > ul {
			padding: 0;
			margin: 0;
			list-style: none; }
			.site-mobile-menu .site-nav-wrap > li > ul > li {
			  display: block; }
			  .site-mobile-menu .site-nav-wrap > li > ul > li > a {
				padding-left: 40px;
				font-size: 16px; }
			  .site-mobile-menu .site-nav-wrap > li > ul > li > ul {
				padding: 0;
				margin: 0; }
				.site-mobile-menu .site-nav-wrap > li > ul > li > ul > li {
				  display: block; }
				  .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li > a {
					font-size: 16px;
					padding-left: 60px; }
		.site-mobile-menu .site-nav-wrap[data-class="social"] {
		  float: left;
		  width: 100%;
		  margin-top: 30px;
		  padding-bottom: 5em; }
		  .site-mobile-menu .site-nav-wrap[data-class="social"] > li {
			width: auto; }
			.site-mobile-menu .site-nav-wrap[data-class="social"] > li:first-child a {
			  padding-left: 15px !important; }
	.align-items-center {
			-webkit-box-align: center !important;
			-ms-flex-align: center !important;
			align-items: center !important;
		}
	.text-right {
		text-align: right !important;
	}
	@media (min-width: 768px)
		.ml-md-0, .mx-md-0 {
			margin-left: 0 !important;
		}
		.mr-auto, .mx-auto {
			margin-right: auto !important;
		}
	.row-nav {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		/* margin-right: -15px;
		margin-left: -15px; */
	}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style-font-nav.css')}}">
	<!--script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script-->
	<script src="{{asset('frontend/assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('frontend/assets/js/main-nav.js')}}"></script>
</div>
