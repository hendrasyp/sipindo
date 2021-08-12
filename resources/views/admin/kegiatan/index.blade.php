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
     
    @include('admin/kegiatan/tambah')
    
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
              @include('admin/kegiatan/edit')
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $kegiatans->links() }}
    </table>
</div>