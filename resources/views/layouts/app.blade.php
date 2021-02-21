<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<!-- Styles -->
	<link href="{{ asset('css/blog-dashboard.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet">

</head>
<body>
	<div class="wrapper">
		<div class="section">
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
				<div class="container">
					<div class="navbar-wrapper">
						<a class="navbar-brand" href="{{ url('/') }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="175" height="55" style=""><rect id="backgroundrect" width="100%" height="100%" x="0" y="0" fill="none" stroke="none"/>
								<g style="">
									<title>background</title>
									<rect fill="none" id="canvas_background" height="52" width="172" y="-1" x="-1"/>
									<g display="none" id="canvasGrid">
										<rect fill="url(#gridpattern)" stroke-width="0" y="0" x="0" height="100%" width="100%" id="svg_1"/>
									</g>
								</g>
								<g style="" class="currentLayer">
									<title>Layer 1</title>
									<text transform="matrix(1.4320239722217332,0,0,1.5418433721918543,-250.84606784129122,-267.0335339913435) " stroke="#41e841" xml:space="preserve" text-anchor="start" font-family="sans-serif" font-size="24" id="svg_5" y="196.16609104408013" x="201.5601718728204" stroke-opacity="1" stroke-width="0" fill="#919191" class="" fill-opacity="1">Larablog</text>
									<path id="svg_6" d="m22,31.45313" opacity="0.5" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#2d3748"/>
									<path id="svg_7" d="m39,51.45313" opacity="0.5" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#2d3748"/>
									<text stroke="#000" transform="matrix(1.2455602317548597,0,0,1.9939411608951554,-54.535800051100956,-96.81905411376354) " xml:space="preserve" text-anchor="start" font-family="sans-serif" font-size="24" id="svg_13" y="65.49784" x="41.89101947588312" fill-opacity="null" stroke-opacity="null" stroke-width="0" fill="#9c27b0" class="">L</text>
									<text stroke="#000" transform="matrix(1.2072971589692718,0,0,2.257053112557174,-28.403462911556577,-11.068315389596174) " xml:space="preserve" text-anchor="start" font-family="sans-serif" font-size="24" id="svg_14" y="27.966799999999996" x="32.87080722646472" fill-opacity="1" stroke-opacity="null" stroke-width="0" fill="#b804b8" class="">B</text>
									<rect fill="#9c27b0" fill-opacity="0.5" stroke="#000" stroke-opacity="0.5" stroke-width="0" stroke-dashoffset="" fill-rule="nonzero" opacity="0.22" id="svg_4" x="76" y="9" width="0" height="0" style="color: rgb(0, 0, 0);"/></g>
								</svg>
							</a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<!-- Left Side Of Navbar -->
							<ul class="navbar-nav mr-auto">

							</ul>

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
										@if(Auth::user()->can_access_dashboard())
										<a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
										@endif
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
			</div>
			<div class="home-panel">
				<div class="content">
					@yield('content')
				</div>
				<footer class="footer">
					<div class="container-fluid">
						Developed using Laravel : {{ app()->version() }}
						<div class="copyright">
							© <span>hicham.ajarif@gmail.com</span>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</body>
</html>