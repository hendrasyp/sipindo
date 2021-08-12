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
<!--Blog Start-->

<section id="solusi" class="solusi mb-0 mt90">
   <div class="container content">
      @if (app()->isLocale('en'))
         <h1>Publication</h1>
      @else
         <h1>Publikasi</h1>
      @endif
      <div class="btn-toggle-area">
         <div clsas="btn-toggle-wrapper">
            @if (app()->isLocale('en'))
               {{-- <span style="margin-right: 20px;">Categories: </span> --}}
               <div class="row">
                  <div class="col-md-12">
                     <button type="button" class="btn-toggle btn-artikel active" data="artikel">Articles</button>
                     <button type="button" class="btn-toggle btn-editorial" data="editorial">Editorial</button>
                     <button type="button" class="btn-toggle btn-rilis" data="rilis">Releases</button>
                  </div>
               </div>
            @else
               {{-- <span style="margin-right: 20px;">Kategori: </span> --}}
               <div class="row">
                  <div class="col-md-12">
                     <button type="button" class="btn-toggle btn-artikel active" data="artikel">Artikel</button>
                     <button type="button" class="btn-toggle btn-editorial" data="editorial">Editorial</button>
                     <button type="button" class="btn-toggle btn-rilis" data="rilis">Rilis</button>
                  </div>
               </div>
            @endif
         </div>
      </div>
      <div class="row content-area content-artikel" id="content-artikel">
         @include('artikel.data-artikel')
      </div> 
      <div class="content-view view-artikel">
         @if (app()->isLocale('en'))
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-artikel">View More</button>
               </div>
            </div>
         @else
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-artikel">Selanjutnya</button>
               </div>
            </div>
         @endif
         <div class="ajax-load-artikel text-center" style="display: none;">
            <p>Loading more artikel</p>
         </div>
      </div>
      <div class="row content-area content-editorial" id="content-editorial" style="display: none;">
         @include('artikel.data-editorial')
      </div>
      <div class="content-view view-editorial" style="display: none;">
         @if (app()->isLocale('en'))
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-editorial">View More</button>
               </div>
            </div>
         @else
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-editorial">Selanjutnya</button>
               </div>
            </div>
         @endif
         <div class="ajax-load-editorial text-center" style="display: none;">
            <p>Loading more artikel</p>
         </div>
      </div>
      <div class="row content-area content-rilis" style="display: none;">
         @include('artikel.data-rilis')
      </div>
      <div class="content-view view-rilis" style="display: none;">
         @if (app()->isLocale('en'))
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-rilis">View More</button>
               </div>
            </div>
         @else
            <div class="col-md-12">
               <div class="text-center m20">
                  <button type="button" class="btn btn-success btn-lg more-rilis">Selanjutnya</button>
               </div>
            </div>
         @endif
         <div class="ajax-load-rilis text-center" style="display: none;">
            <p>Loading more artikel</p>
         </div>
      </div>
      {{-- <div class="row justify-content-center">
         {{ $artikels->links() }}
      </div> --}}
   </div>
</section>

<script type="text/javascript">
   $(document).ready(function(){
      $('.btn-toggle').click(function(){
			var data = $(this).attr('data');
			$(".btn-toggle").removeClass('active');
			$(this).addClass('active');
			$(".content-area").hide();
         $(".content-view").hide();
			$(".content-" +data).show();
         $(".view-" +data).show();
		});
   });
</script>

<script type="text/javascript">
   function loadMoreArtikel(page)
   {
      $.ajax({
         url: '?page=' + page,
         type: 'get'
      })
      .done(function(data){
         $('.ajax-load-artikel').hide();
         $('#content-artikel').append(data.artikel);
      })
      .fail(function(jqXHR,ajaxOptions,thrownError){
         alert("Server not Responding");
      });
   }

   function loadMoreEditorial(page)
   {
      $.ajax({
         url: '?page=' + page,
         type: 'get'
      })
      .done(function(data){
         if(data.editorial == ""){
            $('.ajax-load-editorial').html("no more records found");
            return;
         }
         $('.ajax-load-editorial').hide();
         $('#content-editorial').append(data.editorial);
      })
      .fail(function(jqXHR,ajaxOptions,thrownError){
         alert("Server not Responding");
      });
   }

   function loadMoreRilis(page)
   {
      $.ajax({
         url: '?page=' + page,
         type: 'get'
      })
      .done(function(data){
         if(data.rilis == 0){
            alert("kosong");
         }
         $('.ajax-load-rilis').hide();
         $('#content-rilis').append(data.rilis);
      })
      .fail(function(jqXHR,ajaxOptions,thrownError){
         alert("Server not Responding");
      });
   }

   var page = 1;
   $(document).ready(function(){
      $('.more-artikel').click(function(){
         page++;
         loadMoreArtikel(page);
      });
      $('.more-editorial').click(function(){
         page++;
         loadMoreEditorial(page);
      });
      $('.more-rilis').click(function(){
         page++;
         loadMoreRilis(page);
      });
   });
</script>

{{-- <section>
   
   <div class="container">
   @include('layout.breadcrumb') 
   <div class="row">
   <?php foreach($artikel as $artikel) { ?>
         <!--Blog Small Post Start-->
      <div class="col-md-4 col-lg-3">
         <div class="card">
            <a href="{{ asset('publikasi/read/'.$artikel->slug_artikel) }}"><img src="{{ asset('uploads/image/artikel/thumbs/'.$artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->slug_artikel }}"></a>
            <div class="card-body">
               <h5><a href="{{ asset('publikasi/read/'.$artikel->slug_artikel) }}">
                  @if (app()->isLocale('en'))
               <?=$artikel->judul_artikel_en ?? $artikel->judul_artikel ;?>
               @else
               <?=$artikel->judul_artikel ?>
               @endif</a>
               </h5>
               <!-- <ul class="nav">
                  <li> <a href="{{ asset('publikasi/read/'.$artikel->slug_artikel) }}"><i class="fas fa-calendar-alt"></i> {{ tanggal('tanggal_id',$artikel->tanggal_post)}}</a></li>
                  &nbsp;&nbsp;
               </ul> -->
               <p>
               
               @if (app()->isLocale('en'))

               <?php 
               $isi_en = \Illuminate\Support\Str::limit(strip_tags($artikel->isi_en), 100, $end='...') ;
               ?>
               <?=$isi_en ;?>
               @else
               <?php 
               $isi = \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 100, $end='...');
               
               ?>
               <!-- <?=$isi;?> -->
               @endif
               
               </p>
               <a href="{{ asset('publikasi/read/'.$artikel->slug_artikel) }}"></i> {{ $artikel->nama_kategori }}</a> 
               <a href="{{ asset('publikasi/read/'.$artikel->slug_artikel) }}" class="float-right pb-2">{{__('lang.selengkapnya')}}</a>

            </div>
         </div>
      </div>   
         <!--Blog Small Post End--> 
         <?php } ?>   
   </div>
   <div class="row justify-content-center">
      {{ $artikels->links() }}
   </div>

   </div>
</section> --}}
<!--Blog End--> 