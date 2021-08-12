@foreach ($fit as $fitur)
<div class="modal fade" id="Edit{{$fitur->id_fitur}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content"> 
    <div class="modal-header py-2">
        <h6 class="modal-title" id="myModalLabel">Edit Fitur {{ $fitur->nama_fitur }}</h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    
      <form class="form-horizontal" action="{{ asset('admin/fitur/edit') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
      @csrf
      <input type="hidden" name="id_fitur" value="{{ $fitur->id_fitur }}">
        <div class="row form-group">
            <label class="col-md-2 col-form-label text-right">Icon</label>
            <div class="col-md-10">
            <input type="text" name="icon" id="" class="form-control" value="{{ $fitur->icon }}">
            </div>
        </div>

        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Nama Fitur</label>
          <div class="col-md-10">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-toggle="tab" href="#editFiturID" role="tab" aria-controls="editFiturID" aria-selected="true">ID</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-toggle="tab" href="#editFiturEN" role="tab" aria-controls="editFiturEN" aria-selected="false">EN</a>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="editFiturID" role="tabpanel" aria-labelledby="editFiturID">
            <input type="text" name="nama_fitur" class="form-control" value="{{ $fitur->nama_fitur }}" required>
            </div>
            <div class="tab-pane fade" id="editFiturEN" role="tabpanel" aria-labelledby="editFiturEN">
            <input type="text" name="nama_fitur_en" class="form-control" value="{{ $fitur->nama_fitur_en }}">
            </div>
            </div>
            
          </div>
        </div>


        <div class="row form-group">
          <label class="col-md-2 col-form-label text-right">Status</label>
          <div class="col-md-10">
            <select name="status" id="" class="form-control">
                <option value="{{ $fitur->status }}">{{ $fitur->status }}</option>
              <option value="">-- Status --</option>
              <option value="Publish">Publish</option>
              <option value="Tidak">Tidak</option>
            </select>
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