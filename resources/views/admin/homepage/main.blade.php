<div class="row mb-3">
    <div class="col-md-6">
    {{-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah Baru
            </button> --}}
        </div>
      <div class="col-md-6">
        <form  action="{{ asset('admin/konfigurasi/cari') }}" method="get" accept-charset="utf-8">
          {{ csrf_field() }}
        <div class="input-group">                  
          <input type="text" name="keywords" class="form-control" placeholder="Pencarian" value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
          <span class="input-group-append">
            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
          </span>
        </div>
        </form>
      </div>
      
    </div>
     
    {{-- @include('admin/konfigurasi/tambah') --}}
    
    @if ($errors->any())
        <div class="callout callout-danger py-2">
        <h6 class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
    
    <form action="{{ asset('admin/konfigurasi/proses') }}" method="post" accept-charset="utf-8">
    <input type="hidden" name="pengalihan" value="<?php echo url()->full(); ?>">
    <?php $site   = DB::table('konfigurasi')->first(); ?>
    {{ csrf_field() }}

    </div>
        
    <div class="table-responsive table-main">
    <table class="display table table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th width="5%">
                <div class="table-controls icheck-primary">
                    <!-- Check all button -->
                   <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
                   <label for="check-all"></label>
                </div>
          </th>
          <th width="5%">Gambar</th>
          <th width="40%">Title</th>
          <th width="40%">Deskripsi</th>
          <th width="20%" class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    
  
    
      <tr>
          <td class="text-center">
            <div class="icheck-primary">
              <input type="checkbox" name="id_konfigurasi[]" value="{{ $konfigurasi->id_konfigurasi }}" >
              <label for="check"></label>
            </div>
          </td>
          </form>
          <td class="text-center">
              <a href="{{ asset('uploads/image/'.$konfigurasi->hero_bg) }}" data-toggle="lightbox" data-title="">
                  <img src="{{ asset('uploads/image/'.$konfigurasi->hero_bg) }}" class="img-thumbnail img-size-50 mr-2" >
              </a>
          </td>
          
          <td>
              <h6>{{ $konfigurasi->hero_title }}</h6>
          </td>
          
          <td>
              <h6>
                  @if (app()->isLocale('en'))
                  <?=$konfigurasi->hero_text_en ?? 'no translation available' ;?>
                  @else
                  <?=$konfigurasi->hero_text ?>
                  @endif
              </h6>
          </td>
          <td>
            <div class="text-center">
      
              <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit"><i class="fa fa-edit"></i></button>
      
              {{-- <a href="{{ url('admin/konfigurasi/delete/'.$konfigurasi->id_konfigurasi) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a> --}}
            </div>
            {{-- @include('admin/konfigurasi/edit') --}}
          </td>
      </tr>
 
    
    </tbody>
    </table>
    </div>

{{-- <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content"> 
    <div class="modal-header py-2">
        <h6 class="modal-title" id="myModalLabel">Tambah Main Homepage</h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    
    <form class="form-horizontal" action="{{ asset('admin/main-background/tambah') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    @csrf
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Title</label>
      <div class="col-md-10">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-toggle="tab" href="#tambahJudulID" role="tab" aria-controls="tambahJudulID" aria-selected="true">ID</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#tambahJudulEN" role="tab" aria-controls="tambahJudulEN" aria-selected="false">EN</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tambahJudulID" role="tabpanel" aria-labelledby="tambahJudulID">
        <input type="text" name="hero_title" class="form-control" placeholder="Judul" required>
        </div>
        <div class="tab-pane fade" id="tambahJudulEN" role="tabpanel" aria-labelledby="tambahJudulEN">
        <input type="text" name="hero_title_en" class="form-control" placeholder="Title">
        </div>
        </div>
        
      </div>
    </div>

    <div class="row form-group">
        <label class="col-md-2 col-form-label text-right">Deskripsi</label>
        <div class="col-md-10">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
              <a class="nav-link active" data-toggle="tab" href="#tambahDeskripsiID" role="tab" aria-controls="editDeskripsiID" aria-selected="true">ID</a>
          </li>
          <li class="nav-item" role="presentation">
              <a class="nav-link" data-toggle="tab" href="#tambahDeskripsiEN" role="tab" aria-controls="editDeskripsiEN" aria-selected="false">EN</a>
          </li>
          </ul>
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="tambahDeskripsiID" role="tabpanel" aria-labelledby="editDeskripsiID">
            <textarea name="hero_text" class="form-control" placeholder="Deskripsi"></textarea>
          </div>
          <div class="tab-pane fade" id="tambahDeskripsiEN" role="tabpanel" aria-labelledby="editDeskripsiEN">
            <textarea name="hero_text_en" class="form-control" placeholder="Description"></textarea>
          </div>
          </div>
          
        </div>
      </div>
    
    
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Upload Gambar, Urutan</label>
      <div class="col-md-7">
    <input type="file" name="hero_bg" class="form-control" placeholder="Upload gambar">
    </div>
    
    </div>
    

    
    
    
    <div class="row form-group">
      <label class="col-md-2 text-right"></label>
      <div class="col-md-10">
    <div class="form-group">
    <button type="submit"  class="btn btn-primary ">
      <i class="fa fa-save"></i> Simpan
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    </div>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>
</div> --}}

<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content"> 
    <div class="modal-header py-2">
        <h6 class="modal-title" id="myModalLabel">Edit Main Homepage</h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    
    <form class="form-horizontal" action="{{ asset('admin/main-background/edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    @method('PATCH')
    {{ csrf_field() }}
    <input type="hidden" name="id_konfigurasi" value="{{ $konfigurasi->id_konfigurasi }}">
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Title</label>
      <div class="col-md-10">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-toggle="tab" href="#editjudulID">ID</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#editjudulEN">EN</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane in active" id="editjudulID" role="tabpanel" aria-labelledby="editjudulID">
        <input type="text" name="hero_title" class="form-control" placeholder="Judul Layanan" value="<?php echo $konfigurasi->hero_title ?>" required>
        </div>
        <div class="tab-pane fade" id="editjudulEN" role="tabpanel" aria-labelledby="editjudulEN">
        <input type="text" name="hero_title_en" class="form-control" placeholder="Service Title" value="<?php echo $konfigurasi->hero_title_en ?>">
        </div>
        </div>
        
      </div>
    </div>

    <div class="row form-group">
        <label class="col-md-2 col-form-label text-right">Deskripsi</label>
        <div class="col-md-10">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
              <a class="nav-link active"  data-toggle="tab" href="#editDeskripsiID" role="tab" aria-controls="editDeskripsiID" aria-selected="true">ID</a>
          </li>
          <li class="nav-item" role="presentation">
              <a class="nav-link" data-toggle="tab" href="#editDeskripsiEN" role="tab" aria-controls="editDeskripsiEN" aria-selected="false">EN</a>
          </li>
          </ul>
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="editDeskripsiID" role="tabpanel" aria-labelledby="editDeskripsiID">
            <textarea name="hero_text" class="form-control" ><?php echo $konfigurasi->hero_text ?></textarea>
            <input type="hidden" name="hero_text2" value="<?php echo $konfigurasi->hero_text ?>">
          </div>
          <div class="tab-pane fade" id="editDeskripsiEN" role="tabpanel" aria-labelledby="editDeskripsiEN">
            <textarea name="hero_text_en" class="form-control"><?php echo $konfigurasi->hero_text_en ?></textarea>
            <input type="hidden" name="hero_text_en2" value="<?php echo $konfigurasi->hero_text_en ?>">
          </div>
          </div>
          
        </div>
      </div>
    
    
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Upload Gambar, Urutan</label>
      <div class="col-md-7">
    <input type="file" name="hero_bg" class="form-control" placeholder="Upload gambar">
    <input type="hidden" name="hero_bg2" value="<?php echo $konfigurasi->hero_bg ?>">
    </div>
    
    </div>
    

    
    
    
    <div class="row form-group">
      <label class="col-md-2 text-right"></label>
      <div class="col-md-10">
    <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary ">
      <i class="fa fa-save"></i> Simpan
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    </div>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#mainSipindo").addClass('menu-is-opening menu-open');
      $("#SipindoNav").addClass('active');
      $("#LayananSip .nav-link").addClass('active');
        }); 
      </script>
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