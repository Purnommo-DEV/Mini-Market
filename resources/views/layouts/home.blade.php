<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Alccani Mart</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{asset('frontend/assets/images/ikotak.png')}}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	{{-- <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"/> --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!-- StyleSheet -->
	@include ('includes.style')
</head>
<body class="js">
	
	{{-- <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> --}}
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						@if(Auth::check())
							<div class="right-content">
								<ul class="list-main">
								
									<li><i class="ti-user	"></i> <a href="#">{{ Auth::user()->name }}</a></li>
									<li><i class="ti-power-off"></i><a href="{{ route ('Profil')}}">Profil</a></li>
									<li>
											<i class="ti-power-off"></i>
											<a title="Keluar" href="{{route('UserLogOut')}}" 
											onclick="event.preventDefault(); 
											document.getElementById('logout-form').submit();">Keluar</a>
										</li>
										<form id="logout-form" action="{{route('UserLogOut')}}" method="post">
											@csrf
										</form>
								</ul>
							</div>
						@else
							<div class="right-content">
								<ul class="list-main">
								
									<li><i class="ti-user	"></i> <a href="{{ route('HalamanRegister') }}">Daftar</a></li>
									<li><i class="ti-power-off"></i><a href="{{ route('HalamanLogin') }}">Login</a></li>
								</ul>
							</div>
						@endif
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form" action="{{ route('PencarianProduk') }}" method="GET">
									<input type="search" placeholder="Search here..." name="cari">
									<button type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form action="{{ route('PencarianProduk') }}" method="GET">
									<input name="cari" placeholder="Search Products Here....." type="search">
									<button type="submit" class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
						
							<div class="sinlge-bar shopping">
								<a href="{{ route('Keranjang') }}" class="single-icon"><i class="ti-bag"></i> <span class="total-produkKeranjang total-count"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							
							<div class="all-category">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Kategori</h3>
								</button>
								<ul class="main-category collapse navbar-collapse" id="navbarSupportedContent">
									@foreach (kategori() as $kategoris)
									<li><a href="#">{{ $kategoris->nama_kategori }}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="sub-category">
											@foreach (subkategori() as $subkategoris)
												@if($subkategoris->kategori_id == $kategoris->id )
													<li><a href="{{ route('SubKategori', $subkategoris->id) }}">{{ $subkategoris->nama_subkategori }}</a></li>
												@endif
											@endforeach
										</ul>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li><a href="{{ route('SemuaProduk') }}">Produk</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

	<!-- Slider Area -->
        @yield('content')
    <!-- Modal end -->
	
	<!-- Start Footer Area -->
	@include('includes.footer')

	<!-- Jquery -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<!-- Color JS -->
<script src="{{asset('frontend/assets/js/colors.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{asset('frontend/assets/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('frontend/assets/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('frontend/assets/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('frontend/assets/js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('frontend/assets/js/nicesellect.js')}}"></script>
<!-- Flex Slider JS -->
<script src="{{asset('frontend/assets/js/flex-slider.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{asset('frontend/assets/js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{asset('frontend/assets/js/onepage-nav.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{asset('frontend/assets/js/easing.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('frontend/assets/js/active.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@yield('script')

<script>
	tampilProdukKeranjang()
	
	$.ajaxSetup
	({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		}
	});

	function tampilProdukKeranjang() {
		$.ajax({
			method: "GET",
			url: "/totalProdukDlmKeranjang",
			success: function (response) {
				$('.total-produkKeranjang').html('');
				$('.total-produkKeranjang').html(response.totalProdukKeranjang);
			}
		});
	}
	
</script>
</body>
</html>