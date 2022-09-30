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
                            <th>Personal Grade</th>
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
                            <th>Personal Grade</th>
                            <th>PISA</th>
                            <th>Tgl Pengajuan</th>
                            <th>Ket</th>
                            <td>Status</td>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <?php $no=1; foreach ($request->result() as $r) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r->n_pegawai ?></td>
                                <td><?= $r->n_pasien ?></td>
                                <td><?= $r->nik_request ?></td>
                                <td><?= $r->id_jabatan ?></td>
                                <td><?= $r->pisa ?></td>
                                <td><?= $r->tgl_pengajuan ?></td>
                                <td><?= $r->ket ?></td>
                                <td>
                                    <?php if($r->a_ohc == 0 ){ 
                                       echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                   }elseif ($r->a_ohc == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';}?>
                                </td>
                                <td>
                                    <?php if($r->a_ohc == 0 ){ 
                                        echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                        echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/Edit/'.$r->id_request).">Edit</a>";
                                        echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                                    }elseif ($r->a_ohc == 1 ){ 
                                        echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    }?>
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
