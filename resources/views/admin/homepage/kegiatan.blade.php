<div class="row mb-3">
    <div class="col-md-6">
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah Baru
            </button>
        </div>
      <div class="col-md-6">
        <form  action="{{ asset('admin/kegiatan/cari') }}" method="get" accept-charset="utf-8">
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
     
    {{-- @include('admin/kegiatan/tambah') --}}
    
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
          <th width="40%">Link URL</th>
          <th width="20%">Status</th>
          <th width="20%" class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($kegiatans as $kegiatan)
        <tr>
            <td class="text-center">
              <div class="icheck-primary">
                <input type="checkbox" name="id_kegiatan[]" value="{{ $kegiatan->id_kegiatan }}" >
                <label for="check"></label>
              </div>
            </td>
            <td class="text-center">
                <a href="{{ asset('uploads/kegiatan/'.$kegiatan->gambar) }}" data-toggle="lightbox" data-title="">
                    <img src="{{ asset('uploads/kegiatan/'.$kegiatan->gambar) }}" class="img-thumbnail img-size-50 mr-2" >
                </a>
            </td>
            
            <td>
                <h6>
                    @if (app()->isLocale('en'))
                    <?=$kegiatan->judul_en ?? 'no translation available' ;?>
                    @else
                    <?=$kegiatan->judul ?>
                    @endif
                </h6>
            </td>
             
            <td>
                <h6>
                    @if (app()->isLocale('en'))
                    <?=$kegiatan->deskripsi_en ?? 'no translation available' ;?>
                    @else
                    <?=$kegiatan->deskripsi ?>
                    @endif
                </h6>
            </td>
            <td>
                <h6>{{ $kegiatan->link_url }}</h6>
            </td>
            <td class="text-center">
              <a href="#" data-toggle="tooltip" title="<?php echo $kegiatan->status ?>">
                <span class="<?php if($kegiatan->status=="Publish") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
                <i class="fa <?php if($kegiatan->status=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php //echo $kegiatan->status ?></span>
              </a>
            </td>
            <td>
              <div class="text-center">
        
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit{{$kegiatan->id_kegiatan}}"><i class="fa fa-edit"></i></button>
        
                {{-- <button class="btn btn-danger btn-xs hapus" data-id="{{ $kegiatan->id_kegiatan }}" data-action="{{ route('admin/kegiatan/hapus',$kegiatan->id_kegiatan) }}">
                  <i class="fa fa-trash-alt"></i>
                </button> --}}
                <a href="{{ url('admin/kegiatan/delete/'.$kegiatan->id_kegiatan) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
              </div>
              {{-- @include('admin/kegiatan/edit') --}}
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $kegiatans->links() }}
    </table>
</div>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content"> 
    <div class="modal-header py-2">
        <h6 class="modal-title" id="myModalLabel">Tambah Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    
      <form class="form-horizontal" action="{{ asset('admin/kegiatan/tambah') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      @csrf
        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Judul</label>
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
            <input type="text" name="judul" class="form-control" placeholder="Judul" required>
            </div>
            <div class="tab-pane fade" id="tambahJudulEN" role="tabpanel" aria-labelledby="tambahJudulEN">
            <input type="text" name="judul_en" class="form-control" placeholder="Title">
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
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                  </div>
                  <div class="tab-pane fade" id="tambahDeskripsiEN" role="tabpanel" aria-labelledby="editDeskripsiEN">
                    <textarea name="deskripsi_en" class="form-control" placeholder="Description"></textarea>
                  </div>
                </div>
              
            </div>
        </div>

        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Link URL</label>
          <div class="col-md-10">
            <input type="text" name="link_url" id="" class="form-control">
          </div>
        </div>

        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Status</label>
          <div class="col-md-10">
            <select name="status" id="" class="form-control">
              <option value="">-- Status --</option>
              <option value="Publish">Publish</option>
              <option value="Tidak">Tidak</option>
            </select>
          </div>
        </div>
      
      
        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Upload Gambar</label>
          <div class="col-md-7">
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
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
      </form>
    </div>
    </div>
    </div>
</div>

@foreach ($keg as $kegiatan)
<div class="modal fade" id="Edit{{ $kegiatan->id_kegiatan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
  <div class="modal-content"> 
  <div class="modal-header py-2">
      <h6 class="modal-title" id="myModalLabel">Edit Kegiatan {{ $kegiatan->id_kegiatan }}</h6>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  </div>
  <div class="modal-body">
  
  <form class="form-horizontal" action="{{ asset('admin/kegiatan/edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  @csrf
  @method('PATCH')
    <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id_kegiatan }}">
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Judul</label>
      <div class="col-md-10">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-toggle="tab" href="#editJudul{{$kegiatan->id_kegiatan}}" role="tab" aria-controls="editJudul{{$kegiatan->id_kegiatan}}" aria-selected="true">ID</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-toggle="tab" href="#editJudulEN{{$kegiatan->id_kegiatan}}" role="tab" aria-controls="editJudulEN{{$kegiatan->id_kegiatan}}" aria-selected="false">EN</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="editJudul{{$kegiatan->id_kegiatan}}" role="tabpanel" aria-labelledby="editJudul{{$kegiatan->id_kegiatan}}">
            <input type="text" name="judul" class="form-control" placeholder="Judul" required value="{{ $kegiatan->judul }}">
          </div>
          <div class="tab-pane fade" id="editJudulEN{{$kegiatan->id_kegiatan}}" role="tabpanel" aria-labelledby="editJudulEN{{$kegiatan->id_kegiatan}}">
            <input type="text" name="judul_en" class="form-control" placeholder="Title" value="{{ $kegiatan->judul_en }}">
          </div>
        </div>
        
      </div>
    </div>

    <div class="row form-group">
        <label class="col-md-2 col-form-label text-right">Deskripsi</label>
        <div class="col-md-10">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#editDeskripsiID{{$kegiatan->id_kegiatan}}" role="tab" aria-controls="editDeskripsiID{{$kegiatan->id_kegiatan}}" aria-selected="true">ID</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#editDeskripsiEN{{$kegiatan->id_kegiatan}}" role="tab" aria-controls="editDeskripsiEN{{$kegiatan->id_kegiatan}}" aria-selected="false">EN</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="editDeskripsiID{{$kegiatan->id_kegiatan}}" role="tabpanel" aria-labelledby="editDeskripsiID{{$kegiatan->id_kegiatan}}">
              <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ $kegiatan->deskripsi }}</textarea>
              <input type="hidden" name="deskripsi2" value="{{ $kegiatan->deskripsi }}">
            </div>
            <div class="tab-pane fade" id="editDeskripsiEN{{$kegiatan->id_kegiatan}}" role="tabpanel" aria-labelledby="editDeskripsiEN{{$kegiatan->id_kegiatan}}">
              <textarea name="deskripsi_en" class="form-control" placeholder="Description">{{ $kegiatan->deskripsi_en }}</textarea>
              <input type="hidden" name="deskripsi_en2" value="{{ $kegiatan->deskripsi_en }}">
            </div>
          </div>
          
        </div>
    </div>

      <div class="row form-group">
        <label class="col-md-2 col-form-label text-right">Link URL</label>
        <div class="col-md-10">
          <input type="text" name="link_url" id="" class="form-control" value="{{ $kegiatan->link_url }}">
        </div>
      </div>

      <div class="row form-group">
        <label class="col-md-2 col-form-label text-right">Status</label>
        <div class="col-md-10">
          <select name="status" id="" class="form-control">
            <option value="{{ $kegiatan->status }}"></option>
            <option value="Publish">Publish</option>
            <option value="Tidak">Tidak</option>
          </select>
        </div>
      </div>
    
    
    <div class="row form-group">
      <label class="col-md-2 col-form-label text-right">Upload Gambar, Urutan</label>
      <div class="col-md-7">
        <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
        <input type="hidden" name="gambar2" value="{{ $kegiatan->gambar }}">
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
  </form>
  
  </div>
  </div>
  </div>
</div>
@endforeach

{{-- <script type="text/javascript">
  $("body").on("click",".hapus",function(){
    var current_object = $(this);
    swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data dan File yang ada akan dihapus ?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id_kegiatan" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script> --}}