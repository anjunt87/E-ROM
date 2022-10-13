<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Korwil Setting</h6>
        </div><br>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKorwilModal">Tambah Korwil</a>
           <div class="table-responsive">
                <table class="table table-bordered table-hover" style="font-size:13px;" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-gray-200">
                        <tr>
                            <th>No</th>
                            <th>Nama Korwil</th>
                            <th>Wilayah</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i = 1; ?>
                        <?php foreach ($korwil as $d) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $d['n_korwil']; ?></td>
                                <td><?= $d['n_korwil2']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['telp_korwil']; ?></td>
                                <td><?= $d['hp_korwil']; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editKorwilModal<?= $d['id_korwil'];?>" class="badge badge-sm badge-primary">Edit</a>
                                    <a href="#" data-toggle="modal" data-target="#hapusKorwilModal<?= $d['id_korwil'];?>" class="badge badge-sm badge-danger">Hapus</a>
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

<!-- Tambah Korwil Modal -->
<div class="modal fade" id="tambahKorwilModal" tabindex="-1" role="dialog" aria-labelledby="tambahKorwilModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKorwilModal">Tambahkan Korwil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('korwil/tambah'); ?>" method="post">
                <div class="modal-body">
                    <label>Nama Korwil</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="n_korwil" name="n_korwil" placeholder="Nama Korwil" required="">
                    </div>
                    <label>Nama Wilayah</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="n_korwil2" name="n_korwil2" placeholder="Wilayah" required="">
                    </div>
                    <label>Alamat</label> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="Alamat" placeholder="Alamat Korwil" required="">
                    </div>
                    <label>Telp</label> 
                    <div class="form-group">
                        <input type="number" class="form-control" id="telp_korwil" name="telp_korwil" placeholder="Telp" required="">
                    </div>
                    <label>No HP</label> 
                    <div class="form-group">
                        <input type="number" class="form-control" id="hp_korwil" name="hp_korwil" placeholder="No HP" required="">
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

<!-- Edit Korwil Modal -->
<?php foreach ($korwil as $d ): ?>
    <div class="modal fade" id="editKorwilModal<?= $d['id_korwil'];?>" tabindex="-1" role="dialog" aria-labelledby="editKorwilModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKorwilModal">Edit Korwil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('korwil/edit'); ?>" method="post">
                    <div class="modal-body">
                        <label>Nama Korwil</label>
                        <div class="form-group">
                            <input type="hidden" name="id_korwil" value="<?= $d['id_korwil']?>">
                            <input type="text" class="form-control" id="n_korwil" name="n_korwil" placeholder="Nama Korwil" value="<?= $d['n_korwil']?>" required>
                        </div>
                        <label>Nama Wilayah</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="n_korwil2" name="n_korwil2" placeholder="Nama Wilauah" value="<?= $d['n_korwil2']?>" required>
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Korwil" value="<?= $d['alamat']?>" required>
                        </div>
                        <label>Telp Korwil</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="telp_korwil" name="telp_korwil" placeholder="Telp" value="<?= $d['telp_korwil']?>">
                        </div>
                        <label>No HP</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hp_korwil" name="hp_korwil" placeholder="No Hp" value="<?= $d['hp_korwil']?>">
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


<!-- Hapus Korwil Modal -->
<?php foreach ($korwil as $d ): ?>
    <div class="modal fade" id="hapusKorwilModal<?= $d['id_korwil'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusKorwilModal" aria-hidden="true">
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
                    <a class="btn btn-danger" href="<?= site_url('korwil/delete/'.$d['id_korwil']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach ?><!-- End Hapus Korwil Modal -->



