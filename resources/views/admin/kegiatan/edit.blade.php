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