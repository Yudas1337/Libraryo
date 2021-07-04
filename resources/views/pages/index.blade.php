
@extends('layouts.app')
@section('konten')
		
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
		
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						@if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Gagal!</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

					@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2>Buku Yang Disukai</h2>
								<a class="tg-btn" href="{{ url('buku') }}">View All</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								@foreach($buku as $b)
								<div class="item">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="{{ asset('storage/assets/foto_buku/'.$b->foto_buku) }}" alt="{{ $b->judul_buku }}"></div>
											</div>
											<form method="POST" action="{{ route('wishlist') }}">
												@csrf
											<input style="display: none" type="text" name="id" value="{{ $b->id }}" readonly>
											<button type="submit" class="tg-btnaddtowishlist">
												<i class="icon-heart"></i>
												<span>add to wishlist</span>
											</button>
										</form>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">{{ $b->rak->nama_rak }}</a></li>
											</ul>
											<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
											<div class="tg-booktitle">
												<h3><a href="{{ url('buku/'.$b->id) }}">{{ $b->judul_buku }}</a></h3>
											</div>
											<span class="tg-bookwriter">By:{{ $b->penulis_buku }}</span>
											<form method="POST" action="{{ route('cart') }}">
												@csrf
											<input style="display: none" type="text" name="id" value="{{ $b->id }}" readonly>
											<button type="submit" class="tg-btn tg-btnstyletwo">
												<i class="fa fa-shopping-basket"></i>
												<em>Add To Cart</em>
											</button>	
										</form>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->

			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-featureditm">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
								<figure><img src="{{ asset('home/images/img-02.png') }}" alt="Featured"></figure>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
								<div class="tg-featureditmcontent">
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-booktitle">
										<h3><a href="javascript:void(0);">Things To Know About Green Flat Design</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Farrah Whisenhunt</a></span>
									<span class="tg-stars"><span></span></span>
									<div class="tg-priceandbtn">
										<span class="tg-bookprice">
											<ins>$23.18</ins>
											<del>$30.20</del>
										</span>
										<a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('home/images/parallax/bgparallax-04.jpg') }}">
				<div class="tg-sectionspace tg-collectioncount tg-haslayout">
					<div class="container">
						<div class="row">
							<div id="tg-collectioncounters" class="tg-collectioncounters">
								<div class="tg-collectioncounter tg-drama">
									<div class="tg-collectioncountericon">
										<i class="icon-bubble"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Drama</h2>
										<h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-horror">
									<div class="tg-collectioncountericon">
										<i class="icon-heart-pulse"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Horror</h2>
										<h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-romance">
									<div class="tg-collectioncountericon">
										<i class="icon-heart"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Romance</h2>
										<h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-fashion">
									<div class="tg-collectioncountericon">
										<i class="icon-star"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Fashion</h2>
										<h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2>Buku Terbaru</h2>
								</div>
								<div class="tg-description">
									<p>Berikut ini adalah buku terbaru yang ada di perpustakaan kami. tunggu apalagi , tentunya kalian pasti akan tertarik</p>
								</div>
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="{{ url('buku') }}">View All</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
										@foreach($baru as $b)
										<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="{{ asset('storage/assets/foto_buku/'.$b->foto_buku) }}" alt="{{ $b->judul_buku }}"></div>
													</div>
													<form method="POST" action="{{ route('wishlist') }}">
														@csrf
														<input type="text" name="id" readonly value="{{ $b->id }}" style="display: none">
													<button type="submit" class="tg-btnaddtowishlist">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</button>
												</form>
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li>{{ $b->rak->nama_rak }}</li>
													</ul>
													<div class="tg-booktitle">
														<h3><a href="{{ url('buku/'.$b->id) }}">{{ $b->judul_buku }}</a></h3>
													</div>
													<span class="tg-bookwriter">By:{{ $b->penulis_buku }}</span>
													<span class="tg-stars"><span></span></span>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		
			<!--************************************
					Call to Action Start
			*************************************-->
			<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ asset('home/images/parallax/bgparallax-06.jpg') }}">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<h2>Gratis Semua Buku</h2>
									<h3>Cukup dengan menjadi member, anda dapat menikmati semua buku secara gratis</h3>
									<a class="tg-btn tg-active" href="{{ url('register') }}">Join Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		
		</main>
        @endsection