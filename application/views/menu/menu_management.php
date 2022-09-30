                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?//= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                            <?= $this->session->flashdata('message'); ?>


                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahmenuModal">Tambahkan Menu</a>
                            <table class="table table-hover" id="dataTable">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $i = 1; ?>
                                    <?php  foreach ($menu as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $m['menu']; ?></td>
                                            <td>
                                                <a class="badge badge-primary" data-toggle="modal" data-target="#editMenuModal<?= $m['id'];?>" href="#" >Edit</a>
                                                <a class="badge badge-danger mr-2" data-toggle="modal" data-target="#hapusMenuModal<?= $m['id'];?>" href="#" >Hapus</a>
                                            </td>
                                        </tr>
                                        <?php  $i++; ?>
                                    <?php  endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

                <!-- Tambah Menu Management Modal -->
                <div class="modal fade" id="tambahmenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahmenuModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahmenuModal">Tambahkan Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form acyion="<?//= base_url('menu/addmenu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
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

                <!-- Edit Menu Modal -->
                <?php foreach ($menu as $mn ): ?>
                    <div class="modal fade" id="editMenuModal<?= $mn['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editMenuModal">Edit Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= site_url('menu/editMenu'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?= $mn['id']?>">
                                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu" value="<?= $mn['menu']?>" required>
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

                <!-- Hapus Menu Modal -->
                <?php foreach ($menu as $m ): ?>
                    <div class="modal fade" id="hapusMenuModal<?= $m['id'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusMenuModal" aria-hidden="true">
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
                                    <a class="btn btn-danger" href="<?= site_url('menu/deleteMenu/'.$m['id'])?>">Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
