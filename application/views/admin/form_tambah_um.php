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
                <?= form_open_multipart('admin/tambah_aksi'); ?>
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
                                    <input type="text" class="form-control" name="nik1" placeholder="NIK" value="" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Nama Lengkap Pegawai</label>
                                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= set_value('name'); ?>"
                                    placeholder="Nama Lengkap Pegawai">
                                    <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik"
                                    placeholder="NIK Pegawai" value="<?=set_value('nik'); ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">','</small>'); ?>
                                </div> -->
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
                                <br>
                                <label for="">Atasan : </label>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Atasan</label>
                                    <input type="hidden" class="form-control" name="id_profile" id="id_profile" placeholder="ID Atasan">
                                    <input type="text" class="form-control" name="n_lengkap" id="title" placeholder="Nama Atasan" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">NIK Atasan</label>
                                    <input type="text" class="form-control" name="nik_profile2" id="nik_profile2" placeholder="NIK Atasan" disabled="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="bantuan">KORWIL | CP | UCP : </label>
                                <div class="form-group">
                                    <label for="n_pasien">KORWIL</label>
                                    <select  type="option" class="form-control"  name="id_korwil" id="id_korwil" required>
                                        <option value="">-- Pilih KORWIL --</option>
                                        <?php foreach($korwil as $kr):?>
                                         <option name="id_korwil" id="id_korwil" value="<?= $kr->id_korwil;?>"><?= $kr->n_korwil;?></option>
                                     <?php endforeach;?>
                                 </select>
                             </div>
                             <div class="form-group">
                                <label for="tgl_lahir">Cabang Pelayanan</label>
                                <select  type="option" class="form-control"  name="id_cabang" id="id_cabang" required>
                                    <option value="">-- Pilih Cabang Pelayanan --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Unit Cabang Pelayanan</label>
                                <select  type="option" class="form-control"  name="id_unit" id="id_unit" required>
                                    <option value="">-- Pilih Unit CP --</option>
                                </select>
                            </div>
                            <br>
                            <!-- Departement | Divisi | Jabatan -->
                             <label for="bantuan">Departement | Divisi | Jabatan : </label>
                            <div class="form-group">
                                <label for="n_pasien">Departement</label>
                                <select  type="option" class="form-control"  name="id_departement" id="id_departement" required>
                                    <option value="">-- Pilih Departement --</option>
                                    <?php foreach($departement as $dp):?>
                                        <option name="id_departement" id="id_departement" value="<?= $dp->id_departement;?>"><?= $dp->n_departement;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Divisi</label>
                                <select  type="option" class="form-control"  name="id_divisi" id="id_divisi" required>
                                    <option value="">-- Pilih Divisi --</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Jabatan</label>
                                        <select  type="option" class="form-control"  name="id_jabatan" required> 
                                            <option value="">-- Pilih Jabatan --</option>
                                            <?php foreach($jabatan as $j):?>
                                                <option name="id_jabatan" value="<?= $j['id_jabatan'];?>"><?= $j['n_jabatan'];?></option>
                                            <?php endforeach;?>
                                        </select>
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
    <!-- <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.js" ></script> -->
    <script src="<?= base_url('assets/')?>js/jquery-3.3.1.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_korwil').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= site_url('admin/get_korwil');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_cabang+'>'+data[i].n_cabang+'</option>';
                        }
                        $('#id_cabang').html(html);
                    }
                });
                return false;
            }); 

            $('#id_cabang').change(function(){
                var id_cabang = $('#id_cabang').val();
                var id=$(this).val();
                if(id_cabang != '')
                {
                    $.ajax({
                        url:"<?= site_url('admin/get_cabang');?>",
                        method:"POST",
                        data:{id:id},
                        dataType:"JSON",
                        success:function(data)
                        {
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++)
                            {
                                html += '<option value="'+data[i].id_unit+'">'+data[i].n_unit+'</option>';
                            }
                            $('#id_unit').html(html);
                        }
                    });
                }
                else
                {
                    $('#id_unit').val('');
                }
            });

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
                            html += '<option value='+data[i].id_divisi+'>'+data[i].n_divisi+'</option>';
                        }
                        $('#id_divisi').html(html);
                    }
                });
                return false;
            });

            $("#title").autocomplete({
              source : "<?php echo site_url('admin/get_autocomplete') ?>",
              select: function(event, ui){
                $('[name="title"]').val(ui.label);
                $('[name="nik_profile2"]').val(ui.item.nik_profile);
                $('[name="id_profile"]').val(ui.item.id);
                $('[name="id_departement2"]').val(ui.item.departement_id);
                $('[name="id_divisi2"]').val(ui.item.divisi_id);
            }
        });
        });
    </script>
