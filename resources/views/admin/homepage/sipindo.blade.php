<style>
    #imagePreview {
        width: 250px;
        height: 150px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    }
    </style>
    <script type="text/javascript">
    $(function() {
        $("#file").on("change", function()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
            
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                
                reader.onloadend = function(){ // set image data as background of div
                    $("#imagePreview").css("background-image", "url("+this.result+")");
                }
            }
        });
    });
    </script>
    
     
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-triangle"></i> <strong>Perhatian!</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        </div>
    @endif
    
    <form action="{{ asset('admin/konfigurasi/proses_profil') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    {{ csrf_field() }}
    
    <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">

    
    
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    <div class="row">
        
        <div class="col-md-12">
    
        <div class="row">
     
        <div class="col-9">
        <div class="form-group">
        <label>Nama Profil</label>
        <input type="text" name="nama" placeholder="Nama profil" value="<?php echo $site->namaweb ?>" required class="form-control">
        </div>
    
        <div class="form-group">
        <label>Tagline Profil</label>
        <input type="text" name="tagline" placeholder="Tagline/Motto" value="<?php echo $site->tagline2 ?>" class="form-control">
        </div>
    
        <div class="form-group ">
        <label>Deskripsi Lengkap</label>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="deskID-tab" data-toggle="tab" href="#deskID" role="tab" aria-controls="deskID" aria-selected="true">ID</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="deskEN-tab" data-toggle="tab" href="#deskEN" role="tab" aria-controls="deskEN" aria-selected="false">EN</a>
            </li>
    
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="deskID" role="tabpanel" aria-labelledby="deskID-tab">
            <textarea name="deskripsi_lengkap" rows="3" class="form-control textarea" id="deskripsi_lengkap" placeholder="Deskripsi lengkap"><?php echo $site->deskripsi_lengkap ?></textarea>
            </div>
            <div class="tab-pane fade" id="deskEN" role="tabpanel" aria-labelledby="deskEN-tab">
            <textarea name="deskripsi_lengkap_en" rows="3" class="form-control textarea" id="deskripsi_lengkap_en" placeholder="Deskripsi lengkap"><?php echo $site->deskripsi_lengkap_en ?></textarea>
            </div>
            </div>
       
        </div>
    
        <div class="form-group ">
        <label>Profil Lengkap</label>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profilID-tab" data-toggle="tab" href="#profilID" role="tab" aria-controls="profilID" aria-selected="true">ID</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profilEN-tab" data-toggle="tab" href="#profilEN" role="tab" aria-controls="profilEN" aria-selected="false">EN</a>
        </li>
    
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profilID" role="tabpanel" aria-labelledby="profilID-tab">
        <textarea name="profil_lengkap" rows="3" class="form-control textarea" id="profil_lengkap" placeholder="Profil lengkap"><?php echo $site->profil_lengkap ?></textarea> 
        </div>
        <div class="tab-pane fade" id="profilEN" role="tabpanel" aria-labelledby="profilEN-tab">
        <textarea name="profil_lengkap_en" rows="3" class="form-control textarea" id="profil_lengkap_en" placeholder="Profil lengkap"><?php echo $site->profil_lengkap_en ?></textarea>
        </div>
    
        </div>
        
        </div>
    
    
        <div class="form-group">
            <label>Gambar Profil (150 x 150)</label>
            <input type="file" name="gambar" class="form-control mb-2" id="file">
            <div id="imagePreview"></div>
        </div>
    
        </div>
    
        <div class="col-3">
        <div class="form-group ">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset('uploads/image/'.$site->gambar) }}" class="img-fluid">
        </div>
        </div>
    
        </div>
       
     
    
    </div>
    </div>
    
    </div><!--home tab-->
    
    <div class="form-group">
        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
        <input type="reset" name="reset" value="Reset" class="btn btn-default">
        </div>
    
    </div><!--tab content -->
    
    </form>
     
    <script type="text/javascript">
        $(document).ready(function() {
            $("#mainSipindo").addClass('menu-is-opening menu-open');
      $("#SipindoNav").addClass('active');
      $("#ProfilSip .nav-link").addClass('active');
        }); 
      </script>