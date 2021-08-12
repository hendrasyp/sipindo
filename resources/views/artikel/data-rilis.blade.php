<?php foreach($rilis as $setArtikel) { ?>
   <!--Blog Small Post Start-->
     <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
      <div class="card border-custom height-max">
         <img src="{{ asset('uploads/image/artikel/'.$setArtikel->gambar) }}" class="card-img-top" alt="{{ $setArtikel->slug_artikel }}">
         <div class="card-body">
            <h6 class="font-weight-bold"><a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}">
            @if (app()->isLocale('en'))
           <?=$setArtikel->judul_artikel_en ?? $setArtikel->judul_artikel ;?>
           @else
           <?=$setArtikel->judul_artikel ?>
           @endif
            </a></h6>
            @if($setArtikel->jenis_artikel == "Rilis")
             <a href="{{ asset('publikasi/read/'.$setArtikel->slug_artikel) }}" class="c3"></i> {{ $setArtikel->jenis_artikel }}</a> 
            @endif
            <a href="{{ url('publikasi/read/'.$setArtikel->slug_artikel) }}" class="float-right pb-3 color-custom">{{__('lang.selengkapnya')}}</a>
         </div>
      </div>
     </div> 


   <!--Blog Small Post End--> 
   <?php } ?>