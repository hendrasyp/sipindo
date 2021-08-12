<div class="table-responsive table-main">
    <table id="table1" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%" class="text-center">
                    <div class="table-controls icheck-primary">
                        <!-- Check all button -->
                        <input type="checkbox" id="check-all" class="btn btn-sm checkbox-toggle" />
                    <label for="check-all"></label>
                    </div>
                </th>
                <th>Nama</th>
                <th>Email</th>
                <th>Institusi</th>
                <th>Sektor</th>
                <th>Pesan</th>
                <th width="10%" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>

        @foreach($messages as $message)
        <?php $i=1; ?>
        <tr>
        <?php $i++; ?>
            <td class="text-center">
                <div class="icheck-primary">
                        <input type="checkbox" class="icheckbox_flat-blue " name="id[]" value="{{ $message->id }}" id="check<?php echo $i ?>">
                        <label for="check<?php echo $i ?>"></label>
                </div>
            </td>
            <td>{{ $message->nama }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->institusi }}</td>
            <td>{{ $message->sektor }}</td>
            <td>{{ $message->pesan }}</td>
            <td>
                <div class="text-center">
                <a href="{{ url('admin/message/delete/'.$message->id) }}" class="btn btn-danger btn-xs delete-link">
                    <i class="fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        @endforeach


        </tbody>
    </table>
</div>


<script type="text/javascript">
$(document).ready(function() {
  $("#menuTestimonial .nav-link").addClass('active'); 
}); 
</script>