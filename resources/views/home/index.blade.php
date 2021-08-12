<section id="hero" class="d-flex align-items-center" style="color: #fff; background: url('{{ asset('uploads/image/'.$site_config->hero_bg) }}') top center;background-size: cover;">
  <div class="container" data-aos="fade-up" data-aos-delay="100" style="margin-top: 90px;">
    <div class="row">
         
      <div class="col-md-7 col-sm-12 align-items-center mt20 pl34">
        <h1><?php echo $site_config->hero_title;?></h1>
          <h4>
          @if (app()->isLocale('en'))
          <?=$site_config->hero_text_en ?? 'no translation available' ;?>
          @else
          <?=$site_config->hero_text ?>
          @endif
          </h4> 
      </div>
      <div class="col-md-5 col-sm-12">
        <h3 class="text-left pl20">PUBLIKASI</h3>
        @foreach ($publikasi as $publik)
        <div class="row ml20 width-custom mb-3">
          <div class="col-2 bg-success">
            <img src="{{ asset('uploads/image/artikel/'.$publik->gambar) }}" class="img-thumbnail img-fluid img-banner-custom">
          </div>
          <div class="col-10 bg-white p-2">
            <p style="" class="text-success">{{$publik->jenis_artikel}}</p>
            <a href="{{url('publikasi/read/'.$publik->slug_artikel)}}">{{$publik->judul_artikel}}</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section><!-- End Hero -->
 <!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container content">
           <!-- <div class="section-title mb-0">
          <h2>Tentang Kami</h2>
       <h3>Selamat Datang di <span>{{ $site_config->namaweb }}</span></h3>
          </div>-->
        <div class="row">
          <div class="col-md-9 pt-0 pt-lg-0 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h1><span>{{ $site_config->tagline2 }}</span></h1>
           
            <p>
            @if (app()->isLocale('en'))
               <?=$site_config->deskripsi_lengkap_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->deskripsi_lengkap ?>
               @endif
           </p>
            <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success btn-lg" target="_blank" rel="nofollow" role="button">{{ __('lang.download') }} <i aria-hidden="true" class="fab fa-google-play"></i></a>
            

            <?php if($videoLive) { ?>
             <p>
            <div class="dots-item">
          <div class="dot dot--basic" aria-hidden="true"></div>
          <strong>Live {{$site_config->nama_youtube}}</strong>
        </div></p> 

            <div class="embed-responsive embed-responsive-16by9">
                   <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($videoLive->video, 2);?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
                     <?php } ?>
             
          </div>
          <div class="col-md-3 text-center mt20" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('uploads/image/'.$site_config->gambar) }}" alt="{{ $site_config->namaweb }}" class="img-fluid" width="200">
          </div> 
        </div>

      </div>
</section>

<section id="how" class="how">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p20">
        <div class="how-carousel owl-carousel owl-theme">
          @foreach ($kegiatan as $kegiatan)
            <div class="how-item how-img1" style="background: url('{{ asset('uploads/kegiatan/'.$kegiatan->gambar) }}') center no-repeat; background-size: cover;">
              <div class="container">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-8">
                    <h1>
                      @if (app()->isLocale('en'))
                        {{ $kegiatan->judul_en }}
                      @else
                        {{ $kegiatan->judul }}
                      @endif
                    </h1>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7"></div>
                  <div class="col-md-5">
                    <h4>
                      @if (app()->isLocale('en'))
                        {{ $kegiatan->deskripsi_en }}
                      @else
                        {{ $kegiatan->deskripsi }}
                      @endif
                    </h4>
                    <button type="button" class="btn btn-success btn-lg">
                      <a href="{{ $kegiatan->link_url }}" target="_blank">Selanjutnya</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section id="fitur" class="fitur pt0">
  <div class="container content" data-aos="fade-up">

     <div class="row">
       <div class="col-12">
          <h1>
            Fitur-fitur Kami  
          </h1>

                    <div id="steps">
                        <div class="row mt6">
                          @foreach ($fitur as $key=>$fitur)
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                              <div class="bg-light bs-custom position-relative px-3 my-0">
                                  <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white fitur-icon">
                                      <i class="{{$fitur->icon}}"></i>
                                  </div>
                                  <div class="px-2 text-center pb-2 fitur-desc">
                                      <h4>
                                        @if(app()->isLocale('en'))
                                          {{$fitur->nama_fitur_en}}
                                        @else
                                          {{$fitur->nama_fitur}}
                                        @endif  
                                      </h4>
                                  </div>
                              </div>
                          </div>
                          @if($key == 3)
                          @break
                          @endif
                          @endforeach
                            {{-- <div class="col-md-3">
                                <div class="bg-light bs-custom position-relative px-3 my-0">
                                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white fitur-icon">
                                        <i class="icofont-brand-android-robot"></i>
                                    </div>
                                    <div class="px-2 text-center pb-2 fitur-desc">
                                        <h4>Hama Penyakit Tanaman</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-light bs-custom position-relative px-3 my-0">
                                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white fitur-icon">
                                        <i class="icofont-monitor"></i>
                                    </div>
                                    <div class="px-2 text-center pb-2 fitur-desc">
                                        <h4>Rekomendasi Pemupukan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-light bs-custom position-relative px-3 my-0">
                                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white fitur-icon">
                                        <i class="icofont-hail-rainy"></i>
                                    </div>
                                    <div class="px-2 text-center pb-2 fitur-desc">
                                        <h4>Prediksi Hujan 6 Bulan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-light bs-custom position-relative px-3 my-0">
                                    <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white fitur-icon">
                                        <i class="icofont-monitor"></i>
                                    </div>
                                    <div class="px-2 text-center pb-2 fitur-desc">
                                        <h4>Artikel Pertanian</h4>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                  <div class="text-right m20">
                    <button type="button" class="btn btn-success btn-lg">
                      <a href="{{ url('solusi-kami/sipindo-powered-by-smartseeds') }}">Selanjutnya</a>
                    </button>
                  </div>
        </div>

     </div> 
  </div>
</section>

<section id="smartseeds" class="smartseeds">
  <div class="container content" data-aos="fade-up">
  <!--<div class="section-title mb-0">
      <h2>SMARTseeds</h2>
      
    </div>-->
    {{-- <h1>{{$site_config->smartseeds}}</h1> --}}
     <div class="row">
     <div class="col-md-6">
      <h1>{{$site_config->smartseeds}}</h1>
      <p>
      @if (app()->isLocale('en'))
            <?=$site_config->smartseeds_deskripsi_en ?? 'no translation available' ;?>
            @else
            <?=$site_config->smartseeds_deskripsi ?>
            @endif
            <div class="text-right m20">
              <button type="button" class="btn btn-success btn-lg">
                <a href="{{ url('solusi-kami/smartseeds-b2b-dashboard') }}">Selanjutnya</a>
              </button>
            </div>
      </p>
      {{-- <a href="{{ url('smartseeds-dashboards')}}" class="btn btn-success btn-lg">{{__('lang.fitur')}} <i aria-hidden="true" class="fa fa-arrow-right"></i></a> --}}
      <h3>Fitur kami</h3>
        <div class="smartseeds-carousel owl-carousel owl-theme">
          <?php foreach($sliderSmartseeds as $sliderSmartseeds) { ?>
            <div class="item fitur-content">
              <img src="{{ asset('uploads/image/gallery/'.$sliderSmartseeds->gambar) }}" alt=""> 
              <h6>{{ $sliderSmartseeds->judul_galeri }}</h6>
            </div>
            <?php } ?>
        </div>
      </div>
      <div class="col-md-6 pad0 mobile-hide">
      <img src="{{ asset('uploads/image/'.$site_config->smartseeds_gambar) }}" alt="{{ $site_config->smartseeds }}" class="img-custom">
        </div>
     </div> 
  </div>
</section>

<section id="publikasi" class="publikasi">
  <div class="container" data-aos="fade-up">
     <!--<div class="section-title mb-0">
      <h2>Artikel</h2>
    </div>-->
  
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <h1>Publikasi</h1>
      </div>
      <div class="col-md-4 text-right">
        <a href="{{ url('artikel') }}" 
          class="float-right nav-next">{{__('lang.selengkapnya')}}</a>
      </div>
    </div>

     <div class="row">
        <?php foreach($artikel as $setArtikel) { ?>
        <!--Blog Small Post Start-->
          <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
           <div class="card border-custom height-max">
              <img src="{{ asset('uploads/image/artikel/'.$setArtikel->gambar) }}" class="card-img-top" alt="{{ $setArtikel->slug_artikel }}">
              <div class="card-body">
                 <h6 class="font-weight-bold"><a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}">
                 @if (app()->isLocale('en'))
                  {{ \Illuminate\Support\Str::limit($setArtikel->judul_artikel_en, 40, '....') }}
                @else
                  {{ \Illuminate\Support\Str::limit($setArtikel->judul_artikel, 40, '....') }}
                @endif
                 </a></h6>
                 @if($setArtikel->jenis_artikel == "Artikel")
                  <a href="{{ asset('publikasi/read/'.$setArtikel->slug_artikel) }}" class="c1"></i> {{ $setArtikel->jenis_artikel }}</a> 
                 @endif
                 @if($setArtikel->jenis_artikel == "Editorial")
                  <a href="{{ asset('publikasi/read/'.$setArtikel->slug_artikel) }}" class="c2"></i> {{ $setArtikel->jenis_artikel }}</a> 
                 @endif
                 @if($setArtikel->jenis_artikel == "Rilis")
                  <a href="{{ asset('publikasi/read/'.$setArtikel->slug_artikel) }}" class="c3"></i> {{ $setArtikel->jenis_artikel }}</a> 
                 @endif
                 <a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}" class="float-right pb-3 color-custom">{{__('lang.selengkapnya')}}</a>
              </div>
           </div>
          </div>           
    
        <!--Blog Small Post End--> 
        <?php } ?>
        </div>
     </div> 
  </div>
</section>

<section id="jangkauan" class="jangkauan">
  <div class="container" data-aos="fade-up">
    <div class="content">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Jangkauan Kami</h1>
        </div>
      </div>
      <div class="row mtb20">
        <div class="col-md-4">
          <div class="card jangkauan-card text-center">
            <div class="card-header jangkauan-header">
              <h3>pengguna</h3>
            </div>
            <div class="card-body jangkauan-body">
              <h3>99,999</h3>
              <h5>petani milenial sudah bergabung sejak 2018</h5>
            </div>
         </div>
        </div>
        <div class="col-md-4">
          <div class="card jangkauan-card text-center">
            <div class="card-header jangkauan-header">
              <h3>sebaran</h3>
            </div>
            <div class="card-body jangkauan-body">
              <h5>Pengguna tersebar di</h5>
              <h3>123 kota</h3>
              <h5>di 30 provinsi di indonesia</h5>
            </div>
         </div>
        </div>
        <div class="col-md-4">
          <div class="card jangkauan-card text-center">
            <div class="card-header jangkauan-header">
              <h3>partner</h3>
            </div>
            <div class="card-body jangkauan-body">
              <h3>Slides Logo</h3>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="mitra" class="mitra p0">
  <div class="container" data-aos="fade-up">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <h1>Mitra Kami</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
          <img src="{{url('assets/images/icco-cooperation-vector-logo.png')}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-3 col-sm-12">
          <img src="{{url('assets/images/ipb.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-5 col-sm-12">
          <img src="{{url('assets/images/Nelen-Schuurmans.png')}}" alt="" class="img-fluid">
        </div>
      </div>
  </div>
</section>

<section id="publikasi" class="publikasi">
  <div class="container" data-aos="fade-up">
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <h1>Liputan Media</h1>
        </div>
      </div>
      <div class="row">
        <?php foreach($artikel as $key => $liputanArtikel) { ?>
          @if($key < 4)
          <!--Blog Small Post Start-->
            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
             <div class="card">
                <img src="{{ asset('uploads/image/artikel/'.$liputanArtikel->gambar) }}" class="card-img-top" alt="{{ $liputanArtikel->slug_artikel }}">
                <div class="card-body height-max">
                   <h6 class="font-weight-bold"><a href="{{ url('publikasi/read/'.$liputanArtikel->slug_artikel) }}">
                   @if (app()->isLocale('en'))
                  <?=$liputanArtikel->judul_artikel_en ?? $liputanArtikel->judul_artikel ;?>
                  @else
                  <?=$liputanArtikel->judul_artikel ?>
                  @endif
                   </a></h6>
                </div>
             </div>
            </div>           
      
          <!--Blog Small Post End--> 
          @endif
          <?php } ?>
      </div>
    </div>
  </div>
</section>

    <!--Artikel Mulai-->
{{-- <section id="news" class="news section-bg">
      <div class="container" >
         <div class="section-title mb-0">
          <!--<h2>Fitur</h2>-->
          <h3>{{__('lang.fitur-aplikasi')}} <span>{{ $site_config->namaweb }}</span></span></h3>
        </div>
      
        <div class="content">
        <div class="row">
            <div class="col-md-5 ">
            
              <main id="device">  
                <div class="device mb-3">

                  <div class="app-carousel owl-carousel">
                      <?php foreach($sliderFitur as $slider) { ?>
                      <div class="item">
                        <img src="{{ asset('uploads/image/gallery/'.$slider->gambar) }}" alt=""> 
                      </div>
                      <?php } ?>
                    </div>
              
                </div>
              </main>
             
            </div>

            <div class="col-md-7" data-aos="fade-up">
            @if (app()->isLocale('en'))
               <?=$site_config->fitur_sipindo_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->fitur_sipindo ?>
               @endif
             
              </div>
            </div> 
        </div>
      </div>
      </div>
</section> --}}
<!--News End--> 

<!--Penggunaan Mulai-->
{{-- <section id="penggunaan" class="penggunaan">
      <div class="container content" data-aos="fade-up">

         <div class="row">
           <div class="col-12">
         <h1><span>{{__('lang.penggunaan')}}</span></h1>

          <p>
          @if (app()->isLocale('en'))
               <?=$site_config->panduan_penggunaan_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->panduan_penggunaan ?>
               @endif
        </p>

                           <!--step--> 
                        <div id="steps">
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-cloud-download-alt fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>DOWNLOAD</h4>
                                            <p class="font-weight-light my-2">{{__('lang.panduan-download')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-plug fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>INSTALL</h4>
                                            <p class="font-weight-light my-2">{{__('lang.install-app')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-user-check fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>{{__('lang.registrasi')}}</h4>
                                            <p class="font-weight-light my-2">{{__('lang.daftar-verifikasi')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="bg-light position-relative px-3 my-0">
                                        <div class="font-weight-bold circle text-white rounded-circle d-flex align-items-center justify-content-center mx-auto position-relative border border-white"
                                            style="width: 60px;height: 60px;top: -30px;border-width: 4px !important; background-color: #23A455">
                                            <i class="fas fa-mobile-alt fa-lg"></i>
                                        </div>
                                        <div class="px-2 text-center pb-2">
                                            <h4>{{__('lang.gunakan')}}</h4>
                                            <p class="font-weight-light my-2">{{__('lang.siap-gunakan')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div><!---->
                      <div class="text-center">
                      <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success" target="_blank" rel="nofollow" role="button">{{__('lang.download')}} <i aria-hidden="true" class="fab fa-google-play"></i></a>
                      </div>
            </div>

         </div> 
      </div>
</section> --}}
<!--Penggunaan End--> 


<!--Smartseeds Mulai-->
{{-- <section id="smartseeds" class="smartseeds section-bg">
      <div class="container-fluid mx-5 content" data-aos="fade-up">
      <!--<div class="section-title mb-0">
          <h2>SMARTseeds</h2>
          
        </div>-->
        <h1><span>{{$site_config->smartseeds}}</span></h1>
         <div class="row">
         <div class="col-md-7">
         <p>
         @if (app()->isLocale('en'))
               <?=$site_config->smartseeds_deskripsi_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->smartseeds_deskripsi ?>
               @endif
         </p>
          <a href="{{ url('smartseeds-dashboards')}}" class="btn btn-success btn-lg">{{__('lang.fitur')}} <i aria-hidden="true" class="fa fa-arrow-right"></i></a>
          </div>
          <div class="col-md-5">
          <img src="{{ asset('uploads/image/'.$site_config->smartseeds_gambar) }}" alt="{{ $site_config->smartseeds }}" class="img-fluid">
            </div>
         </div> 
      </div>
</section> --}}
<!--Smartseeds End--> 

<!--Smartseeds Mulai-->
{{-- <section id="smartseeds" class="smartseeds">
      <div class="container content" data-aos="fade-up">
      <h1><span>{{__('lang.fitur-aplikasi')}} {{$site_config->smartseeds}}</span></h1>
         <div class="row">
         <div class="col-md-6 text-center">
         <p>
         @if (app()->isLocale('en'))
               <?=$site_config->smartseeds_fitur_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->smartseeds_fitur ?>
               @endif
        
        </p>
         <a href="<?php echo $site_config->link_googleplay;?>" class="btn btn-success mt-2" target="_blank" rel="nofollow" role="button">{{__('lang.download')}} <i aria-hidden="true" class="fab fa-google-play"></i></a>
          </div>
          <div class="col-md-6">
                  <div class="smartseeds-carousel owl-carousel owl-theme">
                      <?php foreach($sliderSmartseeds as $sliderSmartseeds) { ?>
                      <div class="item">
                        <img src="{{ asset('uploads/image/gallery/'.$sliderSmartseeds->gambar) }}" alt=""> 
                      </div>
                      <?php } ?>
                  </div>

            </div>
         </div> 
      </div>
</section> --}}
<!--Smartseeds End--> 

<!--Artikel Mulai-->
{{-- <section id="news" class="news section-bg">
      <div class="container" data-aos="fade-up">
         <!--<div class="section-title mb-0">
          <h2>Artikel</h2>
        </div>-->
      
      <div class="content">
          <h2>{{__('lang.artikel')}} <a href="{{ url('artikel') }}" 
        class="float-right h5">{{__('lang.selengkapnya')}}</a></h2>

         <div class="row">
            <?php foreach($artikel as $setArtikel) { ?>
            <!--Blog Small Post Start-->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
               <div class="card">
                  <img src="{{ asset('uploads/image/artikel/'.$setArtikel->gambar) }}" class="card-img-top" alt="{{ $setArtikel->slug_artikel }}">
                  <div class="card-body">
                     <h6 class="font-weight-bold"><a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}">
                     @if (app()->isLocale('en'))
                    <?=$setArtikel->judul_artikel_en ?? $setArtikel->judul_artikel ;?>
                    @else
                    <?=$setArtikel->judul_artikel ?>
                    @endif
                     </a></h6>
                     <a href="{{ asset('publikasi/read/'.$setArtikel->slug_artikel) }}"></i> {{ $setArtikel->nama_kategori }}</a> 
                     <a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}" class="float-right pb-3">{{__('lang.selengkapnya')}}</a>
                  </div>
               </div>
              </div>           
        
            <!--Blog Small Post End--> 
            <?php } ?>
            </div>
         </div> 
      </div>
</section> --}}
<!--News End--> 

<!--About Section Start-->

{{-- <section id="video" class="video gallery section-bg">
            <div class="container" data-aos="fade-up">
            <h1 class="text-success">Mitra Kami</h1>
              <div class="row justify-content-center">
              <div class="col-lg-4 col-sm-12">
                <img src="{{url('assets/images/icco-cooperation-vector-logo.png')}}" alt="" class="img-fluid">
              </div>              
              <div class="col-lg-4 col-sm-12">
                <img style="height: 150px; width:150px" src="{{url('assets/images/ipb.jpg')}}" alt="" class="img-fluid">
              </div>              
              <div class="col-lg-4 col-sm-12">
                <img src="{{url('assets/images/Nelen-Schuurmans.png')}}" alt="" class="img-fluid">
              </div>              
              </div>
               <!-- <div class="row">
               <?php if($video) { ?>
                  <div class="col-md-5" data-aos="zoom-out" data-aos-delay="100">
                        <div class="video-img"><a href="https://www.youtube.com/watch?{{ $video->video }}" title="{{ $video->judul }}" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"><i class="fas fa-play"></i></a> <img src="{{ asset('uploads/image/video/'.$video->gambar) }}" alt=""> </div>
                   
                  </div>
                  <div class="col-md-7 content justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3>Video Youtube Sipindo Official</h3>
                        <h2>
                        @if (app()->isLocale('en'))
                        {{ $video->judul_en ?? 'no translation available' }}
                        @else
                        {{ $video->judul }}
                        @endif
                       
                        
                        </h2>
                        <p>
                        @if (app()->isLocale('en'))
                        <?=$video->keterangan_en ?? 'no translation available' ;?>
                        @else
                        <?=$video->keterangan ?>
                        @endif
                        
                        </p>
                  </div>
                  <?php } ?>
               </div>
            </div> -->
            
</section> --}}
<!--About Section End--> 
         
 <!-- ======= Clients Section ======= -->
 <!-- <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">
   <div class="section-title mb-0">
          <h3>{{__('lang.didukung-oleh')}}</h3>
        </div>
        <div class="row justify-content-center">
        <?php 
               foreach($supportedby as $supportedby) {
               ?>
              <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center ">
                   <img src="{{ asset('uploads/image/gallery/'.$supportedby->gambar) }}" class="img-fluid" alt="">

               </div>
               <?php } ?>
    

        </div>

      </div>
    </section> -->
    <!-- End Clients Section -->

<!-- Liputan Media -->
{{-- <div class="container">
  <h2 class="text-success">Liputan Media</h2>
       <div class="container" data-aos="fade-up">      
      <div class="content">
         <div class="row">
            <div class="col-12">
            <h2><a href="{{ url('publikasi') }}" 
        class="float-right h5">{{__('lang.selengkapnya')}}</a></h2>
            
            </div>
            <?php foreach($artikel as $key => $liputanArtikel) { ?>
            @if($key < 3)
            <!--Blog Small Post Start-->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
               <div class="card">
                  <img src="{{ asset('uploads/image/artikel/'.$liputanArtikel->gambar) }}" class="card-img-top" alt="{{ $liputanArtikel->slug_artikel }}">
                  <div class="card-body">
                     <h6 class="font-weight-bold"><a href="{{ url('publikasi/read/'.$liputanArtikel->slug_artikel) }}">
                     @if (app()->isLocale('en'))
                    <?=$liputanArtikel->judul_artikel_en ?? $liputanArtikel->judul_artikel ;?>
                    @else
                    <?=$liputanArtikel->judul_artikel ?>
                    @endif
                     </a></h6>
                     <a href="{{ asset('publikasi/read/'.$liputanArtikel->slug_artikel) }}"></i> {{ $liputanArtikel->nama_kategori }}</a> 
                     <a href="{{ url('publikasi/read/'.$liputanArtikel->slug_artikel) }}" class="float-right pb-3">{{__('lang.selengkapnya')}}</a>
                  </div>
               </div>
              </div>           
        
            <!--Blog Small Post End--> 
            @endif
            <?php } ?>
            </div>
         </div> 
      </div> 
</div> --}}
<!--Testimonials Start-->
<section id="testimonials" class="testimonials p0">
  <div class="container text-center">
    {{-- <div class="row">
      <div class="col-md-12 p0">

        <div class="testimonials-carousel owl-carousel">
          @foreach ($testimonial as $testi)
            <div class="testimonial-item" style="background: url('{{ asset('uploads/image/testimonials/thumbs/'.$testi->gambar) }}') center center no-repeat; background-size: cover;">
              <div class="row justify-content-center">
                <div class="container">
                  <div class="col-md-12">
                    <div class="w70">
                      <h2>"{{ $testi->keterangan }}"
                      </h2>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h3>{{ $testi->nama }}</h3>
                  </div>
                  <div class="col-md-12">
                    <h3>{{ $testi->perusahaan }}</h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        
      </div>
    </div> --}}
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Testimonials</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 p0">
        <div class="testimonials-carousel owl-carousel owl-theme">
          @foreach ($testimonial as $testi)
          <div class="testimonial-item">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card d-flex mx-auto testi-card bg-light">
                    <div class="testi-image"> 
                      <img class="img-fluid d-flex mx-auto" src="{{ asset('uploads/image/testimonials/thumbs/'.$testi->gambar) }}"> 
                    </div>
                    <div class="testi-text">
                        <div class="testi-title">
                          <h2>{{ $testi->keterangan }}</h2>
                        </div>
                    </div>
                    <div class="testi-footer"> 
                      <span id="name">{{ $testi->nama }}<br></span> 
                      <span id="perusahaan">{{ $testi->perusahaan }}</span> 
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section> 

{{-- <section id="how" class="how">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p20">
        <div class="testimonials-carousel owl-carousel owl-theme">
          <div class="testimonial-item how-img1">
            <div class="container">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                  <h1>Bagaimana Kami Membantu?</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">
                  <h4>Layanan Aplikasi SIPINDO Powered by SMARTseeds memberikan wadah bagi pelaku dalam rantai pasok komoditas hortikultura untuk melakukan aktivitas transaksi secara efisien</h4>
                  <button type="button" class="btn btn-success btn-lg">Selanjutnya</button>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-item how-img2">
            <div class="container">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                  <h1>Bagaimana Kami Membantu?</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">
                  <h4>Layanan Aplikasi SIPINDO Powered by SMARTseeds memberikan wadah bagi pelaku dalam rantai pasok komoditas hortikultura untuk melakukan aktivitas transaksi secara efisien</h4>
                  <button type="button" class="btn btn-success btn-lg">Selanjutnya</button>
                </div>
              </div>
            </div>
          </div>
          <div class="testimonial-item how-img3">
            <div class="container">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                  <h1>Bagaimana Kami Membantu?</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">
                  <h4>Layanan Aplikasi SIPINDO Powered by SMARTseeds memberikan wadah bagi pelaku dalam rantai pasok komoditas hortikultura untuk melakukan aktivitas transaksi secara efisien</h4>
                  <button type="button" class="btn btn-success btn-lg">Selanjutnya</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!--Testimonials End--> 
