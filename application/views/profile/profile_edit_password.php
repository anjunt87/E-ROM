<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Profile</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success">Edit Password</h6>
  </div>
  <!-- /. ROW  -->
  <div class="row mb-4">
    <div class="col-md-6">
        <div class="card-body">
            <div class="panel-body">
             <?php echo form_open('profile/editPassword'); ?>
             <!-- <div class="form-group mb-3 <?= form_error('password') ? 'has-error' : null?>">
                <label for="" class="control-label">Masukan Password Baru</label>
                <input type="hidden" name="nik" value="<?= $record['nik'];?>">
                <input type="password" class="form-control" name="password" value="<?= set_value('password')?>">
                <span class="help-block alert-danger alert-danger"><?= form_error('password')?></span>
            </div> -->
           <!--  <div class="form-group mb-3 <?= form_error('cpw_baru') ? 'has-error' : null?>">
                <label for="" class="control-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control"  name="cpw_baru" value="">
                <span class="help-block alert-danger alert-danger"><?= form_error('cpw_baru')?></span>
            </div> -->
                <label for="" class="control-label">Masukan Password Baru</label>
                <div class="input-group mb-3 <?= form_error('password') ? 'has-error' : null?>">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                        <input type="hidden" name="nik" value="<?= $record['nik'];?>">  
                        <input type="password" class="form-control" name="password" value="<?= set_value('password')?>" id="password" required="true" aria-label="password" aria-describedby="basic-addon1" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
                    <span class="help-block alert-danger alert-danger"><?= form_error('password')?></span>
                </div>
                <!-- <label for="" class="control-label">Konfirmasi Password Baru</label>
                <div class="input-group mb-3 <?= form_error('cpw_baru') ? 'has-error' : null?>">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                        <input type="hidden" name="nik" value="<?= $record['nik'];?>">  
                        <input type="password" class="form-control" name="cpw_baru" value="<?= set_value('cpw_baru')?>" id="cpw_baru" required="true" aria-label="cpw_baru" aria-describedby="basic-addon1" placeholder="Konfirmasi Password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="cpw_baru_show_hide();">
                            <i class="fas fa-eye" id="show_eye2"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                        </span>
                    </div>
                    <span class="help-block alert-danger alert-danger"><?= form_error('cpw_baru')?></span>
                </div> -->
            </div>
            <p class="mb-2">Persyaratan kata sandi</p>
            <p class="small text-muted mb-2">Untuk membuat kata sandi baru, Anda harus memenuhi semua persyaratan berikut :</p>
            <ul class="small text-muted pl-4 mb-0">
                <li>Minimal 8 karakter</li>
                <li>Setidaknya satu karakter khusus</li>
                <li>Setidaknya ada satu nomor</li>
                <li>Tidak boleh sama dengan kata sandi sebelumnya</li>
            </ul>
        </div>
        <button type="submit" class="btn btn-success ml-2">Ganti Password</button>
        <a class="btn btn-danger ml-2" href="<?= site_url('Profile/indexProfile/'.$record['nik_profile'])?>">Kembali</a>
    </form>
</div>
</div>
<!-- /. PANEL  -->
</div>
</div>
<script type="text/javascript">
  function password_show_hide(){
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    }else{
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}

function cpw_baru_show_hide(){
    var x = document.getElementById("cpw_baru");
    var show_eye = document.getElementById("show_eye2");
    var hide_eye = document.getElementById("hide_eye2");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    }else{
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}
</script>
