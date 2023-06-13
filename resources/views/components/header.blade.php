<header class="header header-sticky mb-4">
<div class="container-fluid">
  <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
	<svg class="icon icon-lg">
	  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
	</svg>
  </button><a class="header-brand d-md-none" href="#">
	<img width="118" height="46" alt="Web Logo" src="{{ asset('storage/images/'.$data['web_logo']) }}"></a>
  <!--ul class="header-nav d-none d-md-flex">
	<li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
  </ul-->
	<ul class="header-nav d-none d-md-flex">
		<li class="nav-item">Halo, <strong>{{ Auth::user()->nama }}</strong></li>
	</ul>
  <ul class="header-nav ms-3">
	<li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<div class="avatar avatar-md">
			@if(isset(Auth::user()->avatar))
				<img class="avatar-img" src="{{ asset('storage/images/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->email }}">
			@else
				<img class="avatar-img" src="{{ asset('admin/user.png') }}" alt="{{ Auth::user()->email }}">
			@endif
		</div>
	  </a>
	  <div class="dropdown-menu dropdown-menu-end pt-0">
		<div class="dropdown-header bg-light py-2">
		  <div class="fw-semibold">Settings</div>
		</div>
		<a class="dropdown-item" href="{{ route('profil') }}">
		  <svg class="icon me-2">
			<use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
		  </svg> Profile</a>
		<div class="dropdown-divider"></div>
			{{-- <a class="dropdown-item" href="#">
			  <svg class="icon me-2">
				<use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
			  </svg> Lock Account
			</a> --}}
			<a class="dropdown-item" href="{{route('logout')}}">
			  <svg class="icon me-2">
				<use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
			  </svg> Logout
			</a>
	  </div>
	</li>
  </ul>
</div>
