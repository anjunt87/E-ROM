<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cabang Setting</h6>
        </div><br>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahCabangModal">Tambah Cabang</a>
           <div class="table-responsive">
                <table class="table table-hover" style="font-size:13px;" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gray-200">
                        <tr>
                            <th>No</th>
                            <th>Kordinator Wilayah</th>
                            <th>Nama cabang</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i = 1; ?>
                        <?php foreach ($cabang as $d) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $d['n_korwil']; ?></td>
                                <td><?= $d['n_cabang']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['telp_cabang']; ?></td>
                                <td><?= $d['hp_cabang']; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editCabangModal<?= $d['id_cabang'];?>" class="badge badge-sm badge-primary">Edit</a>
                                    <a href="#" data-toggle="modal" data-target="#hapusCabangModal<?= $d['id_cabang'];?>" class="badge badge-sm badge-danger">Hapus</a>
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
<div class="modal fade" id="tambahCabangModal" tabindex="-1" role="dialog" aria-labelledby="tambahCabangModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahCabangModal">Tambahkan Cabang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('cabang/tambah'); ?>" method="post">
                <div class="modal-body">
                    <label>Nama Kordinator Wilayah</label>
                    <div class="form-group">
                        <select  type="option" class="form-control"  name="id_korwil" required>
                            <option value="">-- Pilih Wilayah --</option>
                            <?php foreach($korwil as $dp):?>
                                <option name="id_korwil" value="<?= $dp['id_korwil'];?>"><?= $dp['n_korwil'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <label>Nama Cabang</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="n_cabang" name="n_cabang" placeholder="Nama Cabang" required="">
                    </div>
                    <label>Alamat</label> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Cabang" required="">
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
<?php foreach ($cabang as $d ): ?>
    <div class="modal fade" id="editCabangModal<?= $d['id_cabang'];?>" tabindex="-1" role="dialog" aria-labelledby="editCabangModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editcabangModal">Edit Cabang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('cabang/edit'); ?>" method="post">
                    <div class="modal-body">
                        <label>Kordinator Wilayah</label>
                        <div class="form-group">
                            <select  type="option" class="form-control"  name="id_korwil">
                                <option name="id_korwil" value="<?= $d['korwil_id'];?>"><?= $d['n_korwil']; ?></option>
                                <?php foreach($korwil as $dp):?>
                                    <option value="<?= $dp['id_korwil'];?>"><?= $dp['n_korwil'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <label>Nama Cabang</label>
                        <div class="form-group">
                            <input type="hidden" name="id_cabang" value="<?= $d['id_cabang']?>">
                            <input type="text" class="form-control" id="n_cabang" name="n_cabang" placeholder="Nama Cabang" value="<?= $d['n_cabang']?>" required>
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Cabang" value="<?= $d['alamat']?>" required>
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
<?php foreach ($cabang as $d ): ?>
    <div class="modal fade" id="hapusCabangModal<?= $d['id_cabang'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusCabangModal" aria-hidden="true">
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
                    <a class="btn btn-danger" href="<?= site_url('cabang/delete/'.$d['id_cabang']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach ?><!-- End Hapus cabang Modal -->