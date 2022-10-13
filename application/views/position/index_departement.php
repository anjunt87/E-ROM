<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Departement Setting</h6>
        </div><br>
        <div class="card-body">
         <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahDepartementModal">Tambah Departement</a>
         <div class="table-responsive">
            <table class="table table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gray-200">
                    <tr>
                        <th>No</th>
                        <th>Nama Departement</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $i = 1; ?>
                    <?php foreach ($departement as $d) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $d['n_departement']; ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editDepartementModal<?= $d['id_departement'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" data-toggle="modal" data-target="#hapusDepartementModal<?= $d['id_departement'];?>" class="btn btn-sm btn-danger">Hapus</a>
                            </tr>
                            <?php  $i++; ?>
                        <?php  endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Tambah Departement Modal -->
<div class="modal fade" id="tambahDepartementModal" tabindex="-1" role="dialog" aria-labelledby="tambahDepartementModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDepartementModal">Tambahkan Departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('departement/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group" <?= form_error('n_departement') ? 'has-error' : null?>>
                        <input type="text" class="form-control" id="n_departement" name="n_departement" placeholder="Nama Departement" required="">
                        <span class="help-block alert-danger"><?= form_error('n_departement') ?></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Departement Modal -->
<?php foreach ($departement as $d ): ?>
    <div class="modal fade" id="editDepartementModal<?= $d['id_departement'];?>" tabindex="-1" role="dialog" aria-labelledby="editDepartementModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDepartementModal">Edit Departement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('departement/edit'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_departement" value="<?= $d['id_departement']?>">
                            <input type="text" class="form-control" id="n_departement" name="n_departement" placeholder="Nama Departement" value="<?= $d['n_departement']?>" required>
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


<!-- Hapus Departement Modal -->
<?php foreach ($departement as $d ): ?>
    <div class="modal fade" id="hapusDepartementModal<?= $d['id_departement'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusDepartementModal" aria-hidden="true">
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
                    <a class="btn btn-danger" href="<?= site_url('departement/delete/'.$d['id_departement']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
    <?php endforeach ?>