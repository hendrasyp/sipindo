<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
<!--Inner Header Start-->
{{-- <section class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      <h1>@if (app()->isLocale('en')){{ $title_en ?? '' }}@else{{$title}}@endif</h1>
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</section>  --}}
<!--Inner Header End--> 
<!--Blog Start-->
<section id="solusi" class="solusi mb-0 mt90">
   <div class="container content">
      <h1>Solusi Kami</h1>
      <p>Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami. Deskripsi singkat fokus kami.Deskripsi singkat fokus kami.Deskripsi singkat fokus kami.Deskripsi singkat fokus kami.</p>
      <div class="row">
         <?php foreach($layanan as $layanan) { ?>
         <!--Blog Small Post Start-->
         <div class="col-md-6 col-sm-12">
            <div class="card solusi-card text-center">
               <div class="card-header solusi-header">
               </div>
               <div class="card-body solusi-body">
                  <h3>
                     <a href="{{ url('solusi-kami/'.$layanan->slug_layanan) }}">@if (app()->isLocale('en'))
                     <?=$layanan->judul_layanan_en ?? $layanan->judul_layanan ;?>
                     @else
                     <?=$layanan->judul_layanan ?>
                     @endif</a>
                  </h3>
                  <h3>
                     <a href="{{ url('solusi-kami/'.$layanan->slug_layanan) }}" class="text-center">
                        <i class="icofont-arrow-down"></i>
                     </a>
                  </h3>
                         
                     {{-- @if (app()->isLocale('en'))
                     <p><?php echo \Illuminate\Support\Str::limit(strip_tags($layanan->isi_en), 100, $end='...') ?></p>
                     @else
                     <p><?php echo \Illuminate\Support\Str::limit(strip_tags($layanan->isi), 100, $end='...') ?></p>
                     @endif --}}
                     
                           
                     
               </div>
            </div>
         </div>
         <!--Blog Small Post End--> 
         <?php } ?>
      </div>
      <div class="gt-pagination">
         {{ $layanans->links() }}
      </div>
   </div>
</section>
<!--Blog End--> 

<script type="text/javascript">
    $(document).ready(function() {
      $("#SolusiNav .nav-link").addClass('active'); 
    }); 
  </script>