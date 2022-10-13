<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
        </div><br>

        <form method="post"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari User ..." name="keyword"
            aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="card-body">
       <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahDivisiModal">Tambah Division</a>
       <div class="table-responsive">
        <table class="table table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-gray-200">
                <tr>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Nama Departement</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($divisi as $d) : ?>
                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td><?= $d['n_divisi']; ?></td>
                        <td><?= $d['n_departement'];?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editDivisiModal<?= $d['id_divisi'];?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" data-toggle="modal" data-target="#hapusDivisiModal<?= $d['id_divisi'];?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Tambah Divisi Modal -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahDivisiModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDivisiModal">Tambahkan Division</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('divisi/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Departement</label>
                        <select  type="option" class="form-control"  name="id_departement" required>
                            <option value="">-- Pilih Departement --</option>
                            <?php foreach($departement as $dp):?>
                                <option name="id_departement" value="<?= $dp['id_departement'];?>"><?= $dp['n_departement'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group" <?= form_error('n_divisi') ? 'has-error' : null?>>
                        <label>Nama Divisi</label>
                        <input type="text" class="form-control" id="n_divisi" name="n_divisi" placeholder="Nama Divisi" required=>
                        <span class="help-block alert-danger"><?= form_error('n_divisi') ?></span>
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

<!-- Edit Divisi Modal -->
<?php foreach ($divisi as $d ): ?>
    <div class="modal fade" id="editDivisiModal<?= $d['id_divisi'];?>" tabindex="-1" role="dialog" aria-labelledby="editDivisiModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDivisiModal">Edit Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('divisi/edit'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                             <input type="hidden" name="id_divisi" value="<?= $d['id_divisi']?>">
                            <label>Nama Departement</label>
                            <select  type="option" class="form-control"  name="id_departement">
                                <option name="id_departement" value="<?= $d['departement_id'];?>"><?= $d['n_departement'];?></option>
                                <?php foreach($departement as $dp):?>
                                    <option value="<?= $dp['id_departement'];?>"><?= $dp['n_departement'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Divisi</label>
                            <input type="text" class="form-control" id="n_divisi" name="n_divisi" placeholder="Nama Divisi" value="<?= $d['n_divisi']?>" required="">
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


<!-- Hapus Divisi Modal -->
<?php foreach ($divisi as $d ): ?>
    <div class="modal fade" id="hapusDivisiModal<?= $d['id_divisi'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusDivisiModal" aria-hidden="true">
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
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= site_url('divisi/delete/'.$d['id_divisi']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
    <?php endforeach ?>