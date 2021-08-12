<form action="{{route('uploadFont')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="">Pilih Font</label>
    <div class="form-group">
    <input type="file" class="form-control" name="file_font">
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>