<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Forms Users Management</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> Users </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form role="form"  method="post" action="<?= site_url('admin/tambah_aksi')?>">
                    <!-- cardbody input A dan B -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Data Users : </label>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" name="nik" placeholder="NIK" value="" required>
                                </div>
                                <div class="form-group ">
                                    <label for="role">Role</label>
                                    <!-- <input type="text" class="form-control" name="role" placeholder="Role" value="<?=$row->role?>" required> -->
                                    <select  type="option" class="form-control"  name="role" required>
                                        <option value="">-- Pilih Role --</option>
                                        <?php foreach($role as $r):?>
                                            <option name="role" value="<?= $r['id'];?>"><?= $r['role'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="password" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="bantuan">Departement / Divisi / Jabatan : </label>
                                <div class="form-group">
                                    <label for="n_pasien">Nama Departement</label>
                                    <select  type="option" class="form-control"  name="id_departement" id="id_departement" required>
                                        <option value="">-- Pilih Departement --</option>
                                        <?php foreach($departement as $dp):?>
                                            <option name="id_departement" id="id_departement" value="<?= $dp->id;?>"><?= $dp->n_departement;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Nama Divisi</label>
                                    <select  type="option" class="form-control"  name="id_divisi" id="id_divisi" required>
                                        <option value="">-- Pilih Divisi --</option>
                                        <<!-- ?php foreach($divisi as $dv):?>
                                            <option name="id_divisi" value="<?//= $dv['id'];?>"><?= $dv['n_divisi'];?></option>
                                        <?//php endforeach;?> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Nama Jabatan</label>
                                    <select  type="option" class="form-control"  name="id_jabatan" required> 
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php foreach($jabatan as $j):?>
                                            <option name="id_jabatan" value="<?= $j['id'];?>"><?= $j['n_jabatan'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <br>
                                <label for="">Atasan : </label>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Atasan</label>
                                    <input type="hidden" class="form-control" name="id_profile" id="id_profile" placeholder="ID Atasan">
                                    <input type="text" class="form-control" name="n_lengkap" id="title" placeholder="Nama Atasan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">NIK Atasan</label>
                                    <input type="text" class="form-control" name="nik_profile" id="nik_profile" placeholder="NIK Atasan" disabled="">
                                </div>
                              </div>
                          </div>
                      </div><!-- /.card-body -->
                      <div class="form-group mt-4">
                        <button type="submit" name="submit" class="btn btn-success float-right ml-2">Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-right ">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Select multiDropDown -->
<script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.js" ></script>
<script src="<?= base_url('assets/')?>js/jquery-3.3.1.js" ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_departement').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "<?= site_url('admin/get_divisi');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].n_divisi+'</option>';
                    }
                    $('#id_divisi').html(html);
                }
            });
            return false;
        }); 
        
    });
</script>
<script>
  $(document).ready(function()
  {
    $("#title").autocomplete({
      source : "<?php echo site_url('admin/get_autocomplete') ?>",
      select: function(event, ui){
        $('[name="title"]').val(ui.label);
        $('[name="nik_profile"]').val(ui.item.nik_profile);
        $('[name="id_profile"]').val(ui.item.id);
      }
    });
});
</script>