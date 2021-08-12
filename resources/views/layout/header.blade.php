<?php
$site = DB::table('konfigurasi')->first();
?>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex px-4">
    <nav class="nav-menu social-links ml-auto">
        <ul>
          @if ($site->facebook !== NULL)
            <li>
              <a href="{{$site->facebook}}" class="facebook">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
          @else
          @endif
          @if ($site->youtube !== NULL)
            <li>
              <a href="{{$site->youtube}}" class="youtube">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          @else
          @endif
          @if ($site->youtube !== NULL)
            <li>
              <a href="{{$site->instagram}}" class="instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          @else
          @endif
          @if ($site->twitter !== NULL)
            <li>
              <a href="{{$site->twitter}}" class="twitter">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
          @else
          @endif
          <li class="mobile-hide">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if(app()->isLocale('en'))
                English
              @else
                Bahasa
              @endif
            </a>
            <div class="dropdown-menu p5 mw0" aria-labelledby="dropdownMenuLink">
              <div>
                <div class="d-flex flex-col px-2 pb5">
                  <a href="{{ url('locale/id') }}" class="c-import">Bahasa</a>
                </div>
                <div class="d-flex flex-col px-2 pb5">
                  <a href="{{ url('locale/en') }}" class="c-import">English</a>
                </div>
              </div>
            </div>            
        </li>
        </ul>
      </nav>
      {{-- <nav class="nav-menu contact-info d-none d-lg-block">
        <ul>
            <li><a href="{{ url('blog') }}" title="" alt="">Blog</a></li>
            <li><a href="{{ url('membership') }}" title="" alt="">Membership</a></li>
            <li><a href="{{ url('faq') }}" title="" alt="">FAQ</a>
            <li><a href="{{ url('locale/id') }}" ><i class="flag-icon flag-icon-id"></i> ID</a></li>
            <li><a href="{{ url('locale/en') }}" ><i class="flag-icon flag-icon-us"></i> EN</a></li>


        </ul>
      </nav> --}}
      
    </div>
  </div>
</div>

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center p0">
    <div class="container-fluid d-flex align-items-center px-4">

      <div class="logo mr-auto">
        <h1 class="text-light mb0">
          <a href="{{ url('/') }}">
            <span>
              <img src="{{ url('uploads/image/'.$site->logo) }}" alt="{{$site->namaweb}}">
            </span>
          </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="{{ url('/') }}"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block p10">
        <ul>
            <li><a href="{{ url('tentang-kami') }}">{{ __('lang.tentang-kami') }}</a></li>         
            <li class="solusi-hover dropdown mobile-hide">
                <a class="nav-hover dropdown-toggle" href="{{ url('solusi-kami') }}">
                  @if(app()->isLocale('en'))
                    Our Solutions
                  @else
                    Solusi Kami
                  @endif
                </a>
                <div style="background: rgba(52, 58, 64); opacity: 0.6" class="dropdown-menu drop-custom" aria-labelledby="dropdownMenuLink">
                  <div>
                    <div class="d-flex flex-col px-2 text-align: left">
                      <span><i class="fa fa-caret-right fa-lg text-success"></i></span>
                      <a href="{{ url('solusi-kami/sipindo-powered-by-smartseeds') }}">SIPINDO Powered by SMARTseeds</a>
                    </div>
                    <div class="d-flex flex-col px-2">
                      <span><i class="fa fa-caret-right fa-lg text-success"></i></span>
                      <a href="{{ url('solusi-kami/smartseeds-b2b-dashboard') }}">SMARTseeds B2B Dashboards</a>
                    </div>
                  </div>
                </div>            
            </li>
            <li class="web-hide">
              <a href="{{ url('solusi-kami') }}">
                @if(app()->isLocale('en'))
                  Our Solutions
                @else
                  Solusi Kami
                @endif
              </a>
            </li>
            <li class="web-hide">
              <a href="{{ url('solusi-kami/sipindo-powered-by-smartseeds') }}">SIPINDO Powered by SMARTseeds</a>
            </li>
            <li class="web-hide">
              <a href="{{ url('solusi-kami/smartseeds-b2b-dashboard') }}">SMARTseeds B2B Dashboards</a>
            </li>
            <li>
              <a href="{{ url('/publikasi') }}">
                @if(app()->isLocale('en'))
                  Publication
                @else
                  Publikasi
                @endif
              </a>
            </li>
            {{-- <li><a href="{{ url('coba-sekarang') }}">{{ __('lang.coba-sekarang') }}</a></li> --}}
            <li><a href="{{ url('faq') }}" title="" alt="">FAQ</a>
            <li><a href="{{ url('kontak') }}">{{ __('lang.kontak') }}</a></li>

            <li class="d-block d-lg-none mobile-hide"><a href="{{ url('blog') }}" title="" alt="">Blog</a></li>
          <li class="d-block d-lg-none mobile-hide"><a href="{{ url('membership') }}" title="" alt="">Membership</a></li>
          <li class="d-block d-lg-none mobile-hide"><a href="{{ url('faq') }}" title="" alt="">FAQ</a>
          <li class="d-block d-lg-none"><hr class="mx-3" /></li>
            <li class="d-block d-lg-none"><a href="{{ url('locale/id') }}" ><i class="flag-icon flag-icon-id"></i> ID</a></li>
          <li class="d-block d-lg-none"><a href="{{ url('locale/en') }}" ><i class="flag-icon flag-icon-us"></i> EN</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <form class="inline" id="search_home" action="{{ url('artikel/cari') }}" method="get" accept-charset="utf-8" style="display: none;">
        <input type="text" name="keywords" class="form-search"  value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      </form>
        <button type="button" class="btn btn-p0 btn-search-home" onclick="search_click();">
          <i class="fas fa-search"></i>
        </button>
        {{-- <a href="" class="ml-3 btn btn-light" data-toggle="modal" data-target="#Search">
          <i class="fas fa-search"></i>
        </a> --}}
        <a class="ml-2 gabung-sekarang-btn scrollto btn btn-success br-15" href="{{$site->link_googleplay}}" title="">{{ __('lang.download') }}</a>
    </div>
  </header><!-- End Header --><!-- ======= Hero Section ======= -->
{{-- 
  <div class="modal fade" id="Search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">

				<h5 class="modal-title" id="myModalLabel">{{ __('lang.pencarian') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body py-4">
      <form action="{{ url('artikel/cari') }}" method="get" accept-charset="utf-8">
      {{ csrf_field() }}
    <div class="input-group">                  
      <input  type="text" name="keywords" class="form-control" placeholder="{{ __('lang.kata-pencarian') }}" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-append">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> {{ __('lang.cari') }}</button>
      </span>
    </div>
    </form>
    </div>
		</div>
	</div>
</div> --}}

  