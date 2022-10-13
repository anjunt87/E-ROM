                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
                        </div><br>
                        
                        <!-- <form method="post"
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
                    </form> -->
                    <div class="card-body">
                     <a href="<?= site_url('admin/tambah'); ?>" class="btn btn-primary mb-3" data-toggle="" data-target="">Tambah User</a>
                     <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size:13px;">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Departement</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php  $i = 1; ?>
                                <?php  foreach ($usersManagement as $uM) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $uM['name']; ?></td>
                                        <td><?= $uM['nik']; ?></td>
                                        <td><?= $uM['n_departement']; ?></td>
                                        <td><?= $uM['n_divisi']; ?></td>
                                        <td><?= $uM['n_jabatan']; ?></td>
                                        <td><?php 
                                        if($uM['role_id'] == 1 ){ 
                                         echo '<div class="">Admin</div>';
                                     }elseif ($uM['role_id'] == 2 ){ 
                                         echo '<div class="">Admin OHC</div>';
                                     }elseif ($uM['role_id'] == 3 ){ 
                                         echo '<div class="">Kepala Departement</div>';
                                     }elseif ($uM['role_id'] == 4 ){ 
                                         echo '<div class="">Kepala Divisi</div>';
                                     }elseif ($uM['role_id'] == 5 ){ 
                                         echo '<div class="">Admin Keuangan</div>';
                                     }elseif ($uM['role_id'] == 6 ){ 
                                         echo '<div class="">User (Karyawan)</div>';
                                     }
                                     ?>
                                 </td> 
                                 <td>
                                    <?php $sampeledate = ($uM['date_created']); 
                                        $converdate = format_indo(date('Y-m-d', strtotime($sampeledate)));
                                        echo $converdate;
                                    ?>    
                                </td>
                                 <td>
                                    <?php if($uM['is_active'] == 0 ){ 
                                       echo '<div class="text-danger">Tidak Aktif</div>';
                                   }elseif ($uM['is_active'] == 1 ){ 
                                    echo '<div class="text-success">Aktif</div>';}?>
                                 </td>
                                 <td>
                                    <a href="<?= site_url('admin/edit/').$uM['nik']; ?>" class="badge badge-pill badge-primary">Edit</a>
                                    <a class="badge badge-danger mr-2" data-toggle="modal" data-target="#hapusDivisiModal<?= $uM['nik'];?>" href="#" >Hapus</a>
                                    <!-- <a href="<?//= site_url('admin/deleteuser/') . $uM['nik']; ?>" class="btn btn-sm btn-danger">Hapus</a> -->
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
<!-- /.container-fluid -->

<!-- Hapus Divisi Modal -->
<?php foreach ($usersManagement as $uM ): ?>
    <div class="modal fade" id="hapusDivisiModal<?= $uM['nik'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusDivisiModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Apakah kamu yakin menghapus data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Delete" untuk menghapus data ini.</div>
                <div class="modal-body text-danger">Jika anda menghapus User ini, data yang berhubungan dengan user akan hilang !</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= site_url('admin/deleteuser/'.$uM['nik']); ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>