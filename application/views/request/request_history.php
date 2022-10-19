<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">History</h1>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">History Request</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"  style="font-size:14px;">
                    <thead class="bg-gray-200">
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <!-- <th>Personal Grade</th> -->
                            <th>PISA</th>
                            <th>Tgl Pengajuan</th>
                            <th>Ket</th>
                            <td>Status</td>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-gray-200">
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <!-- <th>Personal Grade</th> -->
                            <th>PISA</th>
                            <th>Tgl Pengajuan</th>
                            <th>Ket</th>
                            <td>Status</td>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <?php $no=1; foreach ($request as $r) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r->n_pegawai ?></td>
                                <td><?= $r->n_pasien ?></td>
                                <td><?= $r->nik_request ?></td>
                                <!-- <td><?= $r->jabatan_id ?></td> -->
                                <td><?= $r->pisa ?></td>
                                <td><?= $r->tgl_pengajuan ?></td>
                                <td><?= $r->ket ?></td>
                                <td>
                                    <?php if($r->a_departement == 0 && $r->t_approve == 0 || $r->a_divisi == 0 && $r->t_approve == 0 || $r->a_ohc == 0 && $r->t_approve == 0 || $r->a_keuangan == 0 && $r->t_approve == 0){ 
                                        echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                    }elseif ($r->a_keuangan == 1 ){ 
                                        echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                                    }elseif($r->a_departement == 2 && $r->a_divisi == 2 && $r->a_ohc == 2 && $r->a_keuangan == 2 && $r->t_approve == 1){
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';

                                    }elseif ( $r->a_departement == 2 && $r->t_approve == 1 || $r->a_divisi == 2 && $r->t_approve == 1 || $r->a_ohc == 2 && $r->t_approve == 1 || $r->a_keuangan == 2 && $r->t_approve == 1){ 
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if($r->a_departement == 0 && $r->a_divisi == 0 && $r->a_ohc == 0 && $r->a_keuangan == 0 && $r->t_approve == 0){ 
                                        echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                        echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/Edit/'.$r->id_request).">Edit Request</a>";
                                        echo "<a class=\"badge badge-sm badge-info mr-2\"  href=".site_url('request/edit_image/'.$r->id_request).">Edit Lampiran</a>";
                                        echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#hapusModal\" href=\"#\" >Hapus</a>";
                                    }elseif ($r->a_departement == 1 || $r->a_departement == 2 || $r->a_divisi == 1 || $r->a_divisi == 2 || $r->a_ohc == 2 || $r->a_ohc == 1 || $r->a_keuangan == 1 || $r->a_keuangan == 2){ 
                                        echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    }elseif($r->a_departement == 2 && $r->a_divisi == 2 && $r->a_ohc == 2 && $r->a_keuangan == 2 && $r->t_approve == 1){
                                        echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                   }
                                   ?>
                               </td>
                           </tr>
                           <?php $no++; } ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>

   </div>
   <!-- /.container-fluid -->

<!-- Hapus Divisi Modal -->
<?php foreach ($request as $r ): ?>
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Apakah kamu yakin menghapus data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Delete" untuk menghapus data.</div>
                <div class="modal-body text-danger">Jika anda menghapus Data ini, data yang berhubungan dengan Request akan hilang !</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= site_url('request/delete/'.$r->id_request); ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>