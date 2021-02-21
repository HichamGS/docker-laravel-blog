<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Dashboard') }}</title>
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<!-- Styles -->
	<link href="{{ asset('css/blog-dashboard.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet">
	<script src="https://cdn.tiny.cloud/1/t6hla2ky0iwsiyou7if7f2xzonr7vsy2ppicm3nt0whmxxyb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	

</head>
<body>
	<div class="wrapper">
		@include('dashboard.layouts.sidebar')
		<div class="main-panel">
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
				<div class="container-fluid">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Authentication Links -->
							@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}"><i class="material-icons">fingerprint</i>{{ __('Login') }}</a>
							</li>
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										<i class="material-icons">person</i>{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('dashboard') }}"><i class="material-icons">dashboard</i>{{ __('Dashboard') }}</a>
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
								@endguest
							</ul>
						</div>
					</div>
				</nav>
				<div class="content">
					@yield('content')
				</div>
				@include('dashboard.layouts.footer');
			</div>
		</div>
		<footer>
			<!-- Scripts -->
 			<script src="{{ asset('js/jquery.js')}}"></script>
			<script src="{{ asset('js/bootstrap-select.min.js') }}" defer></script>
			<script type="text/javascript" src="{{ asset('js/jasny-bootstrap.min.js')}}"></script>

		</footer>
	</body>
</html>
