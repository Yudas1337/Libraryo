<!doctype html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $title }}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('home/vendors/style.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
	<script src="{{ asset('home/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body class="tg-home tg-homeone">
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addnav">
								<li>
									<a href="mailto:{{ $site->email }}">
										<i class="icon-envelope"></i>
										<em>Contact</em>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="icon-question-circle"></i>
										<em>Help</em>
									</a>
								</li>
							</ul>
							<div class="tg-userlogin dropdown tg-themedropdown tg-currencydropdown">
                                <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown"><figure><img width="50" height="50" src="{{ (Auth::check() ? asset('storage/assets/foto_user/'.auth()->user()->foto) : asset('storage/assets/foto_user/default.jpg'))  }}" alt="{{ (Auth::check() ? auth()->user()->nama : "Guest" ) }}"></figure>
                                    <span>
                                        Hi, {{ (Auth::check() ? auth()->user()->nama : "Guest" ) }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                                @if(Auth::check())
                                <li>
                                    <a href="{{ (auth()->user()->is_admin == 1 ? url('admin') : url('users')) }}">
                                        <i class="tio-home"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{ url('login') }}">
                                        <i class="tio-sign-in"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('register') }}">
                                        <i class="tio-lock"></i>
                                        <span>Register</span>
                                    </a>
                                </li>
                                @endif
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="{{ url('') }}"><img src="{{ asset('storage/assets/'.$site->foto) }}" alt="{{ $site->nama }}"></a></strong>
							<div class="tg-wishlistandcart">
								<div class="dropdown tg-themedropdown tg-wishlistdropdown">
									<a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">{{ (Session::get('wishlist.items') ? count(Session::get('wishlist.items')) : '0') }}</span>
										<i class="icon-heart"></i>
										<span>Wishlist</span>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-whistlist">
										<div class="tg-minicartbody">
											@if(Session::get('wishlist.items'))
											@foreach(Session::get('wishlist.items') as $cart)
											<div class="tg-minicarproduct">
												<figure>
													<img width="50" height="50" src="{{ asset('storage/assets/foto_buku/'.$cart['foto_buku']) }}" alt="{{ $cart['judul_buku'] }}">
													
												</figure>
												<div class="tg-minicarproductdata">
													<h5><a href="{{ url('buku/'.$cart['id']) }}">{{ substr($cart['judul_buku'],0,25) }}</a></h5>
													<h6>{{ $cart['penulis_buku'] }}</h6>
												</div>
											</div>
											@endforeach
											@else
											<div class="tg-minicarproduct">
												<div class="tg-description"><p>Wishlist masih kosong!</p></div>
											</div>
											@endif
										</div>
										@if(Session::get('wishlist.items'))
										<div class="tg-minicartfoot">
											<form method="POST" action="{{ route('destroy_wishlist') }}">
												@csrf
											<button class="tg-btnemptycart" type="submit" onclick="return confirm('Apa anda yakin akan mengosongkan wishlist?')">
												<i class="fa fa-trash-o"></i>
												<span>Clear Your Wishlist</span>
											</button>
										</form>
											<span class="tg-subtotal">Total Buku: <strong>{{ count(Session::get('wishlist.items')) }}</strong></span>
										</div>
										@endif
									</div>
								</div>
								<div class="dropdown tg-themedropdown tg-minicartdropdown">
									<a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">{{ (Session::get('cart.items') ? count(Session::get('cart.items')) : '0') }}</span>
										<i class="icon-cart"></i>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
										<div class="tg-minicartbody">
											@if(Session::get('cart.items'))
											@foreach(Session::get('cart.items') as $cart)
											<div class="tg-minicarproduct">
												<figure>
													<img width="50" height="50" src="{{ asset('storage/assets/foto_buku/'.$cart['foto_buku']) }}" alt="{{ $cart['judul_buku'] }}">
													
												</figure>
												<div class="tg-minicarproductdata">
													<h5><a href="{{ url('buku/'.$cart['id']) }}">{{ substr($cart['judul_buku'],0,25) }}</a></h5>
													<h6>{{ $cart['penulis_buku'] }}</h6>
													<br>
													<form method="POST" action="{{ route('delete',$cart['id']) }}">
														@csrf
													<button type="submit" class="tg-btn">Hapus Buku</butto>
												</form>
												</div>
											</div>
											@endforeach
											@else
											<div class="tg-minicarproduct">
												<div class="tg-description"><p>Keranjang masih kosong!</p></div>
											</div>
											@endif
										</div>
										@if(Session::get('cart.items'))
										<div class="tg-minicartfoot">
											<form method="POST" action="{{ route('destroy') }}">
												@csrf
											<button class="tg-btnemptycart" type="submit" onclick="return confirm('Apa anda yakin akan mengosongkan keranjang?')">
												<i class="fa fa-trash-o"></i>
												<span>Kosongkan keranjang</span>
											</button>
										</form>
											<span class="tg-subtotal">Total Buku: <strong>{{ count(Session::get('cart.items')) }}</strong></span>
											<div class="tg-btns">
												<a class="tg-btn" href="{{ url('cart') }}">View Cart</a>
											</div>
										</div>
										@endif
									</div>
								</div>
							</div>
							<div class="tg-searchbox">
								<form class="tg-formtheme tg-formsearch">
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN..." autocomplete="off">
										<button type="submit"><i class="icon-magnifier"></i></button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li><a href="{{ url('') }}">Home</a></li>
										<li><a href="{{ url('books') }}">Books</a></li>
										<li><a href="{{ url('about') }}">About Us</a></li>
										<li><a href="{{ url('contact') }}">Contact Us</a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>

        @yield('konten')

        	<!--************************************
				Footer Start
		*************************************-->
		<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<strong class="tg-logo"><a href="javascript:void(0);"><img src="{{ asset('storage/assets/'.$site->foto) }}" alt="image description"></a></strong>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>{{ $site->nama }}</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												<em>{{ $site->no_telp }}</em>
											</span>
										</li>
										<li>
											<i class="icon-clock"></i>
											<span>Serving 7 Days A Week From 9am - 5pm</span>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="https://facebook.com/Yudas1337"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-instagram"><a href="https://instagram.com/Yudas1337"><i class="fa fa-instagram"></i></a></li>
										<li class="tg-linkedin"><a href="https://www.linkedin.com/in/yudas1337/"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="mailto:yudasmalabi@gmail.com"><i class="fa fa-envelope"></i></a></li>
										<li class="tg-linkedin"><a href="https://t.me/Yudas1337"><i class="fa fa-telegram"></i></a></li>
										<li class="tg-whatsapp"><a href="https://wa.me/send?phone=6282257181297"><i class="fa fa-whatsapp"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Shipping And Help Information</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li><a href="{{ url('home') }}">Home</a></li>
											<li><a href="{{ url('books') }}">Books</a></li>
											<li><a href="{{ url('about-us') }}">About Us</a></li>
											<li><a href="{{ url('contact-us') }}">Contact Us</a></li>
										</ul>
										<ul>
											<li><a href="{{ url('login') }}">Login</a></li>
											<li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
											<li><a href="{{ url('terms') }}">Terms</a></li>
											<li><a href="{{ url('faq') }}">FAQ</a></li>
										</ul>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-copyright">{{ date('Y') }} All Rights Reserved By &copy; {{ $site->nama }}</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="{{ asset('home/js/vendor/jquery-library.js') }}"></script>
	<script src="{{ asset('home/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('home/js/jquery.vide.min.js') }}"></script>
	<script src="{{ asset('home/js/countdown.js') }}"></script>
	<script src="{{ asset('home/js/jquery-ui.js') }}"></script>
	<script src="{{ asset('home/js/parallax.js') }}"></script>
	<script src="{{ asset('home/js/countTo.js') }}"></script>
	<script src="{{ asset('home/js/appear.js') }}"></script>
	<script src="{{ asset('home/js/main.js') }}"></script>
</body>
</html>