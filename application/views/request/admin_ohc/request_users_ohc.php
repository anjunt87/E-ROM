<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Users Request</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="font-size:13px;">
                                 <thead class="bg-gray-200">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nama Pasien</th>
                                        <th>NIK</th>
                                        <th>Personal Grade / Jabatan</th>
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
                                        <th>Personal Grade / Jabatan</th>
                                        <th>PISA</th>
                                        <th>Tgl Pengajuan</th>
                                        <th>Ket</th>
                                        <td>Status</td>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                    <?php $no=1; foreach ($request->result() as $r) { ?>
                        <?php if($r->a_departement == 1 && $r->a_ohc == 0 ) {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$no;
                                    echo "<td>".$r->n_pegawai;
                                    echo "<td>".$r->n_pasien;
                                    echo "<td>".$r->nik_request;
                                    echo "<td>".$r->id_jabatan;
                                    echo "<td>".$r->pisa;
                                    echo "<td>".$r->tgl_pengajuan;
                                    echo "<td>".$r->ket;
                                    echo "<td>";
                                if($r->a_ohc == 0 ){ 
                                    echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                               }elseif ($r->a_ohc == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';}
                                    echo "<td>";
                                if($r->a_ohc == 0 ){ 
                                    echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                        // echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/editRequest/'.$r->id_request).">Edit</a>";
                                        // echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                                }elseif ($r->a_ohc == 1 ){ 
                                    echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                }
                            }?>
                        <?php $no++; }?>