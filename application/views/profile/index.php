<div class="my-4">
  <section class="content">
    <div class="container-fluid">
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <button href="#" data-toggle="modal" data-target="#editImageProfileModal<?= $record['nik'];?>" class="btn btn-sm btn-circle btn-success float-right"><i class="fas fa-edit"></i></button>
              <div class="text-center">
                <?php if($record['img_profile'] == null ){ ?>
                  <img style="height: 200px; width: 200px;" src="<?php echo base_url().'/assets/img/profile/undraw_profile.svg'?>" class="avatar-img rounded-circle" data-lity>
                <?php } else { ?>
                  <img style="height: 200px; width: 200px;" src="<?php echo base_url().'/assets/img/profile/'.$record['img_profile']  ?>" class="avatar-img rounded-circle" data-lity>
                <?php } ?>
              </div>
              <h3 class="profile-username text-center mt-5"><?= $record['n_lengkap'];?></h3>
              <!-- <p class="text-muted text-center">Admin</p> -->
              <hr>
              <a href=" <?= site_url('profile/editProfile/'.$record['nik']) ?>" class="btn btn-success btn-block fa fa-edit" ><b>  Edit Profile</b></a>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="btn btn-sm btn-success" href="#aboutme" data-toggle="tab">Tentang Saya</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#kgb" data-toggle="tab">KGB</a></li> -->
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="aboutme">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Data Diri</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?= $record['n_lengkap'];?></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?= $record['nik'];?></td>
                      </tr>

                      <tr>
                        <td>Kordinator Wilayah</td>
                        <td>:</td>
                        <td><?= $record['n_korwil'];?></td>
                      </tr>
                      <tr>
                        <td>Cabang Pelayanan</td>
                        <td>:</td>
                        <td><?= $record['n_cabang'];?></td>
                      </tr>
                      <tr>
                        <td>Unit Cabang Pelayanan</td>
                        <td>:</td>
                        <td><?= $record['n_unit'];?></td>
                      </tr>

                      <tr>
                        <td>Departement</td>
                        <td>:</td>
                        <td><?= $record['n_departement'];?></td>
                      </tr>
                      <tr>
                        <td>Divisi</td>
                        <td>:</td>
                        <td><?= $record['n_divisi'];?></td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?= $record['n_jabatan'];?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $record['alamat'];?></td>
                      </tr>
                      <tr>
                        <td>No. Handphone</td>
                        <td>:</td>
                        <td><?= $record['no_hp'];?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Edit Image Profile Modal -->
<div class="modal fade" id="editImageProfileModal<?= $record['nik'];?>" tabindex="-1" role="dialog" aria-labelledby="editImageProfiletModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDepartementModal">Edit Image Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="submit">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="nik" value="<?= $record['nik'];?>">
            <input type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg, image/gif"  onchange="preview()">
          </div>
          <div class="modal-body">
            <div class="form-group">
              <img id="frame" src="" class="img-fluid" />
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
          </div>
        </div>
      </form> 
    </div>
  </div>
</div>
<script>
  function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
  }
  function clearImage() {
    document.getElementById('file').value = null;
    frame.src = "";
  }
</script>
<!-- <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.js" ></script> -->
<script src="<?= base_url('assets/')?>js/jquery-3.2.1.js" ></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#submit').submit(function(e){
      e.preventDefault(); 
      $.ajax({
        url:'<?php echo base_url();?>index.php/profile/editImage',
        type:"post",
                 data:new FormData(this), //this is formData
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                 success: function(data){
                  document.location.href = "<?= site_url('profile/IndexProfile/'.$record['nik']); ?>";
                }
              });
    });
  });
</script>
