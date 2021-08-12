<style>
h1.display-4 {
   font-family: "Montserrat", sans-serif;
   font-weight: 700;
   }
</style>
<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
{{-- <div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en')){{ $header_en ?? '' }}@else{{$header}}@endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</div> --}}
<!--Inner Header End--> 
<!--About Start-->
<section id="about" class="about mb-0 mt130">
   <!--Start--> 
      <div class="container content">
      {{-- @include('layout.breadcrumb')  --}}

         {{-- <h1 class="display-4">{{ $site_config->namaweb }}</h1> --}}
         <div class="row">
            <div class="col-md-8">
               <h1>Tentang Kami</h1>
            @if (app()->isLocale('en'))
               <?=$site_config->profil_lengkap_en ?? 'no translation available' ;?>
               @else
               <?=$site_config->profil_lengkap ?>
               @endif
               
            </div>
            <div class="col-lg-4">
               <a href="#">
                  <img src="{{ asset('uploads/image/'.$site_config->gambar) }}" alt="{{ $site_config->namaweb }}" class="img-fluid w100">
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
   <!--About End--> 

<section id="visimisi" class="visimisi bg-success text-light">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h1>Visi</h1>
            <p>Memberikan akses terhadap informasi terkait pertanian yang terpercaya kepada petani untuk mengambil keputusan yang berdasarkan data.</p>
         </div>
         <div class="col-md-6">
            <h1>Misi</h1>
            <p>With SIPINDO, we are providing SMARTseeds information service. SMARTseeds is a geodata-based information services which provides reliable information about their farm to farmers and guides them to conduct good and precise agricultural practices. With SMARTseeds, smallholders farmers can alocate their resources more efficiently, increase their productivity, as well as adapt to changing climate.</p>
         </div>
      </div>
   </div>
</section>

<?php 
$bg2   = DB::table('header')->where('halaman','Team')->orderBy('id_header','DESC')->first();
 ?>
<section id="team" class="team mt-0 mb-0 p20">
   <div class="container" data-aos="fade-up">
      <h1>Team Kami</h1
            <?php 
               $staff    = DB::table('staff')->where(array('status_staff'=>'Ya'))->orderBy('urutan','ASC')->get();
        
               ?>
                 
            <div class="row">
            <?php foreach($staff as $staff) { ?>
            <!--Blog Post Start-->
            <div class="col-md-4 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
               <div class="member">
                  <div class="member-img"> 
                     <img src="{{ asset('uploads/image/staff/thumbs/'.$staff->gambar) }}" class="img-fluid" alt="{{ $staff->nama_staff }}">
                     {{-- <div class="social">
                        @if ($staff->facebook !== NULL)
                           <a href="">
                              <i class="icofont-facebook"></i>
                           </a>
                        @else
                        @endif
         
                        @if ($staff->facebook !== NULL)
                           <a href="">
                              <i class="icofont-twitter"></i>
                           </a>
                        @else
                        @endif
                  
                        @if ($staff->facebook !== NULL)
                           <a href="">
                              <i class="icofont-instagram"></i>
                           </a>
                        @else
                        @endif

                        @if ($staff->facebook !== NULL)
                           <a href="">
                              <i class="icofont-linkedin"></i>
                           </a>
                        @else
                        @endif
                  
                
                     </div> --}}
                  </div>
                 
                  <div class="member-info">
                     <h4><a href="#">{{ $staff->nama_staff }}</a></h4>
                     <span>{{ $staff->jabatan }}<span>
                  </div>
               </div>
            </div>
            <!--Blog Post End--> 
            <?php } ?>

      </div>
</section>
<!--Causes End--> 

<!--Service Area Start-->
 {{-- <section class="mt-0">
   <div class="container text-center">
   <div class="section-title">
          <h2>{{__('lang.solusi-kami')}}</h2>
          <h3>{{__('lang.layanan')}} <span>{{ $site_config->namaweb }}</span></h3>
          </div>
   
      <div class="row">
         <?php foreach($layanan as $layanan) { ?>
            <div class="col-md-6 col-sm-6">
               <div class="card">
                  <img src="{{ asset('uploads/image/layanan/thumbs/'.$layanan->gambar) }}" alt="{{ $layanan->judul_layanan }}" class="img img-fluid">
                  <div class="card-body">
                  <h6>
                  @if (app()->isLocale('en'))
               {{ $layanan->judul_layanan_en ?? 'no translation available' }}
               @else
               {{ $layanan->judul_layanan}}
               @endif
                  </h6>
                 
                  <a href="{{ asset('layanan/'.$layanan->slug_layanan) }}">{{__('lang.selengkapnya')}}</a> 
         </div>
               </div>
            </div>
            <!--box  end--> 
         <?php } ?>
      </div>
   </div>
</div> --}}

</section>

