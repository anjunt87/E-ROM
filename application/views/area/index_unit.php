<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Unit Pelayanan Setting</h6>
        </div><br>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahUnitModal">Unit Pelayanan Cabang</a>
           <div class="table-responsive">
                <table class="table table-hover" style="font-size:13px;" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gray-200">
                        <tr>
                            <th>No</th>
                            <th>Kordinator Wilayah</th>
                            <th>Nama Cabang</th>
                            <th>Nama Unit Cabang</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i = 1; ?>
                        <?php foreach ($unit as $d) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $d['n_korwil']; ?></td>
                                <td><?= $d['n_cabang']; ?></td>
                                <td><?= $d['n_unit']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['telp_cabang']; ?></td>
                                <td><?= $d['hp_cabang']; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editUnitModal<?= $d['id_unit'];?>" class="badge badge-sm badge-primary">Edit</a>
                                    <a href="#" data-toggle="modal" data-target="#hapusUnitModal<?= $d['id_unit'];?>" class="badge badge-sm badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php  $i++; ?>
                        <?php  endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambah cabang Modal -->
<div class="modal fade" id="tambahUnitModal" tabindex="-1" role="dialog" aria-labelledby="tambahUnitModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUnitModal">Tambahkan Unit Pelayanan Cabang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('unit/tambah'); ?>" method="post">
                <div class="modal-body">
                    <label>Kordinator Wilayah</label>
                    <div class="form-group">
                        <select  type="option" class="form-control"  name="id_korwil" id="id_korwil" required>
                            <option value="">-- Pilih Wilayah --</option>
                            <?php foreach($korwil as $dp):?>
                                <option name="id_korwil" id="id_korwil" value="<?= $dp['id_korwil'];?>"><?= $dp['n_korwil'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Cabang</label>
                        <select  type="option" class="form-control"  name="id_cabang" id="id_cabang" required>
                            <option value="">-- Pilih Cabang --</option>
                        </select>
                    </div>
                    <label>Nama Unit Pelayanan Cabang</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="n_unit" name="n_unit" placeholder="Nama Unit Pelayanan Cabang" required="">
                    </div>
                    <label>Alamat Unit Pelayanan Cabang</label> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Unit Pelayanan Cabang" required="">
                    </div>
                    <label>Telp</label> 
                    <div class="form-group">
                        <input type="number" class="form-control" id="telp_cabang" name="telp_cabang" placeholder="Telp" required="">
                    </div>
                    <label>No HP</label> 
                    <div class="form-group">
                        <input type="number" class="form-control" id="hp_cabang" name="hp_cabang" placeholder="No HP" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Cabang Modal -->
<?php foreach ($unit as $d ): ?>
    <div class="modal fade" id="editUnitModal<?= $d['id_unit'];?>" tabindex="-1" role="dialog" aria-labelledby="editUnitModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUnitModal">Edit Unit Pelayanan Cabang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('unit/edit'); ?>" method="post">
                    <div class="modal-body">
                        <label>Kordinator Wilayah</label>
                        <div class="form-group">
                            <select  type="option" class="form-control"  name="id_korwil" id="id_korwil" required>
                                <option value="<?= $d['korwil_id'];?>"><?= $d['n_korwil'];?></option>
                                <?php foreach($korwil as $dp):?>
                                    <option name="id_korwil" id="id_korwil" value="<?= $dp['id_korwil'];?>"><?= $dp['n_korwil'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Cabang</label>
                            <select  type="option" class="form-control"  name="id_cabang" id="cabang_id" required>
                                <option value="<?= $d['cabang_id'];?>"><?= $d['n_cabang'];?></option>
                                 <?php foreach($cabang as $cb):?>
                                    <option name="id_cabang" id="id_cabang" value="<?= $cb['id_cabang'];?>"><?= $cb['n_cabang'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <label>Nama Unit Pelayanan Cabang</label>
                        <div class="form-group">
                            <input type="hidden" name="id_cabang" value="<?= $d['id_unit']?>">
                            <input type="text" class="form-control" id="n_unit" name="n_unit" placeholder="Unit Pelayanan Cabang" value="<?= $d['n_unit']?>" required>
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat cabang" value="<?= $d['alamat']?>" required>
                        </div>
                        <label>Telp Cabang</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="telp_cabang" name="telp_cabang" placeholder="Telp" value="<?= $d['telp_cabang']?>">
                        </div>
                        <label>No HP</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hp_cabang" name="hp_cabang" placeholder="No Hp" value="<?= $d['hp_cabang']?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>


<!-- Hapus cabang Modal -->
<?php foreach ($unit as $d ): ?>
    <div class="modal fade" id="hapusUnitModal<?= $d['id_unit'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusUnitModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Apakah kamu yakin menghapus data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Delete" untuk menghapus data ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= site_url('unit/delete/'.$d['id_unit']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach ?><!-- End Hapus cabang Modal -->

<script src="<?= base_url('assets/')?>js/jquery-3.3.1.js" ></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#id_korwil').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : "<?= site_url('unit/get_cabang');?>",
                method : "POST",
                data : {id_korwil: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_cabang+'>'+data[i].n_cabang+'</option>';
                    }
                    $('#id_cabang').html(html);
                    console.log(id);
                    console.log(data);
                }
            });
            return false;
        }); 
        
    });
</script>