<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
 <style>
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

</style>
<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en')){{ $header_en ?? '' }}@else{{$header}}@endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</div>
<!--Inner Header End--> 
<!--Contact Start-->
<section class="contact-page">
   <div class="container content">
   @include('layout.breadcrumb') 
      <h4>{{__('lang.info-kontak')}}</h4>
      
      <div class="row">
         <!--Contact Info Start-->
         <div class="col-md-6 mb-20">
            <h5>KIRIM PESAN</h5>
               {{-- <form action="{{route('sendMail')}}" method="post"> --}}
                  <form action="{{ url('kontak/post') }}" method="post">
               @csrf
                  <div class="form-group">
                     <label for="">Nama</label>
                     <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">   
                     <label for="">Email</label>
                     <input type="text" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                     <label for="">Institusi</label>
                     <input type="text" class="form-control" name="institusi">
                  </div>
                  <div class="form-group">
                     <label for="">Sektor</label>
                     <input type="text" class="form-control" name="sektor">
                  </div>
                  <div class="form-group">
                     <label for="">Pesan</label>
                  </div>
                  <div class="form-group">
                     <textarea name="pesan" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim</button>
               </form>
         <!-- 
            <div>
               <h5>{{__('lang.kontak')}}:</h5>
               <p>Telepon: <?php echo $site_config->telepon ?>
                <br>Email: <?php echo $site_config->email ?>
                <br>Website: <?php echo $site_config->website ?></p>
            </div>
         </div>

          -->
         <!--Contact Info End--> 
         
         </div>

         <div class="col-md-6 mb-20">
            <div class="row">
               <div class="col-md-12">
                  <h5>{{__('lang.alamat')}}:</h5>
                  <strong><?php echo $site_config->namaweb ?></strong>
                  <?php echo nl2br($site_config->alamat) ?>
               </div>
               <div class="col-md-12">
                  <div class="map-responsive">
                     <?php echo $site_config->google_map ?>
                  </div>
               </div>
            </div>
         </div>

   </div>
   {{-- <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="map-responsive">
               <?php echo $site_config->google_map ?>
            </div>
         </div>
      </div>
   </div> --}}

</section>
<!--Contact End--> 