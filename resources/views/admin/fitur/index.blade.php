<div class="row mb-3">
    <div class="col-md-6">
    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah Baru
            </button>
        </div>
      <div class="col-md-6">
        <form  action="{{ asset('admin/fitur/cari') }}" method="get" accept-charset="utf-8">
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
     
    @include('admin/fitur/tambah')
    
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
          <th width="40%">Icon</th>
          <th width="40%">Nama Fitur</th>
          <th width="20%">Status</th>
          <th width="20%" class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($fiturs as $fitur)
        <tr>
            <td class="text-center">
              <div class="icheck-primary">
                <input type="checkbox" name="id_fitur[]" value="{{ $fitur->id_fitur }}" >
                <label for="check"></label>
              </div>
            </td>
            <td>
                <h6>{{ $fitur->icon }}</h6>
            </td>
            
            <td>
                <h6>
                    {{ $fitur->nama_fitur }}
                </h6>
            </td>
             
            <td class="text-center">
              <a href="#" data-toggle="tooltip" title="<?php echo $fitur->status ?>">
                <span class="<?php if($fitur->status=="Publish") { echo 'text-success'; }else{ echo 'text-warning'; } ?>">
                <i class="fa <?php if($fitur->status=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php //echo $fitur->status ?></span>
              </a>
            </td>
            <td>
              <div class="text-center">
        
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#Edit{{$fitur->id_fitur}}"><i class="fa fa-edit"></i></button>

                <a href="{{ url('admin/fitur/delete/'.$fitur->id_fitur) }}" class="btn btn-danger btn-xs delete-link"><i class="fas fa-trash-alt"></i></a>
              </div>
              @include('admin/fitur/edit')
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $fiturs->links() }}
    </table>
</div>