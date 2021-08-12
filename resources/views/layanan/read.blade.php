<?php  
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
{{-- <div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en'))
         {{ $header_en }}
         @else
         {{ $header }}
         @endif</h1>
      </div>
            <img src="{{ asset('uploads/image/layanan/'.$read->gambar) }}">
         </div>
</div> --}}
<!--Inner Header End--> 
<!--About Start-->
{{-- <section>
<!--About Txt Video Start-->
   <div class="container">
   @if($read->id_layanan == 1)
      <p>Hello world 1</p>
   @elseif($read->id_layanan == 2)
      <p>Hello World 2</p>
   @endif
   <img src="{{ asset('uploads/image/layanan/'.$read->gambar) }}" alt="{{ $title }}" class="img img-fluid mb-3">
   <div class="row justify-content-center">
   <div class="col-lg-10">
   <h1 class="font-weight-bold">
   @if (app()->isLocale('en'))
         {{ $read->judul_layanan_en }}
         @else
         {{ $read->judul_layanan }}
         @endif
        </h1>

   @if (app()->isLocale('en'))
               <?=$read->isi_en ?>
         @else
         <?=$read->isi ?>
         @endif
     
      </div>

   </div>

   </div>
</section> --}}
<!--About Txt Video End--> 

@if($read->id_layanan == 1)
   <section id="about" class="about mt90">
      <div class="container content">
         <!-- <div class="section-title mb-0">
         <h2>Tentang Kami</h2>
      <h3>Selamat Datang di <span>{{ $site->namaweb }}</span></h3>
         </div>-->
      <div class="row">
         <div class="col-md-9 pt-0 pt-lg-0 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h1><span>{{ $site->tagline2 }}</span></h1>
         
            <p>
               @if (app()->isLocale('en'))
                  <?=$site->deskripsi_lengkap_en ?? 'no translation available' ;?>
                  @else
                  <?=$site->deskripsi_lengkap ?>
                  @endif
            </p>
      
            
         </div>
         <div class="col-md-3 text-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('uploads/image/'.$site->gambar) }}" alt="{{ $site->namaweb }}" class="img-fluid" width="200">
         </div> 
      </div>

      </div>
   </section>
   <section id="fitur-solusi" class="fitur-solusi pt0">
      <div class="container content" data-aos="fade-up">
    
         <div class="row">
            <div class="col-12">
               <h1>
                  Fitur-fitur Kami  
               </h1>
            </div>  
         </div>
         <div class="row">
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-brand-android-robot"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
               </div>
         </div>
         <div class="row b1 p20">
            <h4>Hama Penyakit Tanaman</h4>
            <h6>Deskripsi singkat mengenai fitur HPT. Deskripsi singkat mengenai fitur HPT. Deskripsi singkat mengenai fitur HPT. Deskripsi singkat mengenai fitur HPT. Deskripsi singkat mengenai fitur HPT. Deskripsi singkat mengenai fitur HPT.</h6>
         </div>
         <div class="row">
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-brand-android-robot"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
               </div>
         </div>
      </div>
   </section>
   <section id="fitur-solusi" class="fitur-solusi pt0">
      <div class="container content" data-aos="fade-up">
    
         <div class="row">
            <div class="col-12">
               <h1>
                  Penggunaan
               </h1>
               <h6>Deskripsi singkat mengenai penggunaan aplikasi. Deskripsi singkat mengenai penggunaan aplikasi. Deskripsi singkat mengenai penggunaan aplikasi. Deskripsi singkat mengenai penggunaan aplikasi. </h6>
            </div>  
         </div>
         <div class="row mrl20">
            <div class="col-md-3">
               <div class="usage-card usage1">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white usage-icon">
                     <span>1</span>
                  </div>
                  <h6 class="text-center m20">Download aplikasi Sipindo Powered by SMARTseeds</h6>
               </div>
            </div>
            <div class="col-md-3">
               <div class="usage-card usage2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white usage-icon">
                     <span>2</span>
                  </div>
                  <h6 class="text-center m20">Install aplikasi</h6>
               </div>
            </div>
            <div class="col-md-3">
               <div class="usage-card usage3">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white usage-icon">
                     <span>3</span>
                  </div>
                  <h6 class="text-center m20">Daftar dan verifikasi akun pengguna</h6>
               </div>
            </div>
            <div class="col-md-3">
               <div class="usage-card">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white usage-icon">
                     <span>4</span>
                  </div>
                  <h6 class="text-center m20">Kamu siap menggunakan aplikasi Sipindo Powered by SMARTseeds</h6>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 text-center">
               <button type="button" class="btn btn-success btn-lg">
                  Download Sekarang <i class="icofont-arrow-right"></i>
               </button>
            </div>
         </div>

      </div>
   </section>
@elseif($read->id_layanan == 2)
   <section id="smartseeds" class="smartseeds mt90">
      <div class="container-fluid mx-5 content" data-aos="fade-up">
         <div class="row">
            <div class="col-md-7">
               <h1>{{$site->smartseeds}}</h1>
               <p>
               @if (app()->isLocale('en'))
                     <?=$site->smartseeds_deskripsi_en ?? 'no translation available' ;?>
                     @else
                     <?=$site->smartseeds_deskripsi ?>
                     @endif
               </p>
            </div>
            <div class="col-md-5">
               <img src="{{ asset('uploads/image/'.$site->smartseeds_gambar) }}" alt="{{ $site->smartseeds }}" class="img-custom-solusi">
            </div>
         </div> 
      </div>
   </section>
   <section id="fitur-solusi" class="fitur-solusi pt0">
      <div class="container content mw12" data-aos="fade-up">
    
         <div class="row">
            <div class="col-12">
               <h1>
                  Fitur-fitur Kami  
               </h1>
            </div>  
         </div>
         <div class="row">
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-brand-android-robot"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
            </div>
            <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-hail-rainy"></i>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="circle text-white rounded-circle d-flex align-items-center justify-content-center border border-white solusi-icon">
                     <i class="icofont-monitor"></i>
                  </div>
               </div>
         </div>
         <div class="row b1 p20">
            <h4>Peta Akses Jalan</h4>
            <h6>Deskripsi singkat mengenai fitur Peta Akses Jalan. Deskripsi singkat mengenai fitur Peta Akses Jalan. Deskripsi singkat mengenai fitur Peta Akses Jalan. Deskripsi singkat mengenai fitur Peta Akses Jalan. Deskripsi singkat mengenai fitur Peta Akses Jalan. Deskripsi singkat mengenai fitur Peta Akses Jalan.</h6>
         </div>
         <div class="row mtb50">
            <div class="col-md-12 text-center">
               <button type="button" class="btn btn-success btn-lg">
                  Download Sekarang <i class="icofont-arrow-right"></i>
               </button>
            </div>
         </div>
      </div>
   </section>
@endif


