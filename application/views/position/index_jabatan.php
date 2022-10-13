<div class="container-fluid">
    <!-- DataTales Example -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">jabatan Setting</h6>
        </div><br>
        <div class="card-body">
         <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahjabatanModal">Tambah jabatan</a>
         <div class="table-responsive">
            <table class="table table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gray-200">
                    <tr>
                        <th>No</th>
                        <th>Nama jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $i = 1; ?>
                    <?php foreach ($jabatan as $d) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $d['n_jabatan']; ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editjabatanModal<?= $d['id_jabatan'];?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" data-toggle="modal" data-target="#hapusjabatanModal<?= $d['id_jabatan'];?>" class="btn btn-sm btn-danger">Hapus</a>
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

<!-- Tambah jabatan Modal -->
<div class="modal fade" id="tambahjabatanModal" tabindex="-1" role="dialog" aria-labelledby="tambahjabatanModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahjabatanModal">Tambahkan jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('jabatan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group" <?= form_error('n_jabatan') ? 'has-error' : null?>>
                        <input type="text" class="form-control" id="n_jabatan" name="n_jabatan" placeholder="Nama Jabatan" required="">
                        <span class="help-block alert-danger"><?= form_error('n_jabatan') ?></span>
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

<!-- Edit jabatan Modal -->
<?php foreach ($jabatan as $d ): ?>
    <div class="modal fade" id="editjabatanModal<?= $d['id_jabatan'];?>" tabindex="-1" role="dialog" aria-labelledby="editjabatanModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editjabatanModal">Edit jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('jabatan/edit'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_jabatan" value="<?= $d['id_jabatan']?>">
                            <input type="text" class="form-control" id="n_jabatan" name="n_jabatan" placeholder="Nama jabatan" value="<?= $d['n_jabatan']?>" required>
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


<!-- Hapus jabatan Modal -->
<?php foreach ($jabatan as $d ): ?>
    <div class="modal fade" id="hapusjabatanModal<?= $d['id_jabatan'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusjabatanModal" aria-hidden="true">
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
                    <a class="btn btn-danger" href="<?= site_url('jabatan/delete/'.$d['id_jabatan']); ?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
    <?php endforeach ?>