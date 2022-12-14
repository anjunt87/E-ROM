<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Users Request Approve (Departement)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover DataTable-2" id="" width="100%" cellspacing="0" style="font-size:13px;">
                 <thead class="bg-gray-200">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
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
                        <th>PISA</th>
                        <th>Tgl Pengajuan</th>
                        <th>Ket</th>
                        <td>Status</td>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php $no=1; foreach ($request->result() as $r) { ?>
                    <?php if($r->a_departement == 1 && $r->a_divisi == 0 || $r->a_departement == 2 || $r->a_departement == 2 && $r->t_approve == 1){ 
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no;
                        echo "<td>".$r->n_pegawai;
                        echo "<td>".$r->n_pasien;
                        echo "<td>".$r->nik_request;
                        echo "<td>".$r->pisa;
                        echo "<td>".$r->tgl_pengajuan;
                        echo "<td>".$r->ket;
                        echo "<td>";
                        if($r->a_departement == 0 && $r->t_approve == 0 ){ 
                            echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                        }elseif ($r->a_departement == 1 ){ 
                            echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                        }elseif ($r->a_departement == 2 && $r->a_divisi == 0){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                        }elseif ($r->a_departement == 2 && $r->a_divisi == 2 && $r->t_approve == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                        }
                            echo "<td>";
                        if($r->a_departement == 0 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    // echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/editRequest/'.$r->id_request).">Edit</a>";
                                    // echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                        }elseif ($r->a_departement == 1 || $r->a_departement == 2){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                        }
                        $no++; }
                        echo "</tr>";
                        echo "</tbody>";
                    }?>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Users Request Approve (Divisi)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover DataTable-1" id="" width="100%" cellspacing="0" style="font-size:13px;">
                 <thead class="bg-gray-200">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
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
                        <th>PISA</th>
                        <th>Tgl Pengajuan</th>
                        <th>Ket</th>
                        <td>Status</td>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php $no=1; foreach ($request->result() as $r) { ?>
                    <?php if($r->a_divisi == 1 && $r->a_ohc == 0 || $r->a_divisi == 2 || $r->a_divisi == 2 && $r->t_approve == 1){ 
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no;
                        echo "<td>".$r->n_pegawai;
                        echo "<td>".$r->n_pasien;
                        echo "<td>".$r->nik_request;
                        echo "<td>".$r->pisa;
                        echo "<td>".$r->tgl_pengajuan;
                        echo "<td>".$r->ket;
                        echo "<td>";
                        if($r->a_divisi == 0 && $r->t_approve == 0){ 
                            echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                        }elseif ($r->a_divisi == 1 ){ 
                            echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                        }elseif ($r->a_divisi == 2 && $r->a_ohc == 0 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                        }elseif ($r->a_divisi == 2 && $r->a_ohc == 2 && $r->t_approve == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                        }
                            echo "<td>";
                        if($r->a_divisi == 0 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    // echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/editRequest/'.$r->id_request).">Edit</a>";
                                    // echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                        }elseif ($r->a_divisi == 1 || $r->a_divisi == 2 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                        }
                        $no++; }
                        echo "</tr>";
                        echo "</tbody>";
                    }?>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Users Request Approve (Admin OHC)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover DataTable-3" id="" width="100%" cellspacing="0" style="font-size:13px;">
                 <thead class="bg-gray-200">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
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
                        <th>PISA</th>
                        <th>Tgl Pengajuan</th>
                        <th>Ket</th>
                        <td>Status</td>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php $no=1; foreach ($request->result() as $r) { ?>
                    <?php if($r->a_ohc == 1 && $r->a_keuangan == 0 || $r->a_ohc == 2 || $r->a_ohc == 2 && $r->t_approve == 1){ 
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no;
                        echo "<td>".$r->n_pegawai;
                        echo "<td>".$r->n_pasien;
                        echo "<td>".$r->nik_request;
                        echo "<td>".$r->pisa;
                        echo "<td>".$r->tgl_pengajuan;
                        echo "<td>".$r->ket;
                        echo "<td>";
                        if($r->a_ohc == 0 && $r->t_approve == 1){ 
                            echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                        }elseif ($r->a_ohc == 1 ){ 
                            echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                        }elseif ($r->a_ohc == 2 && $r->a_keuangan == 0 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                        }elseif ($r->a_ohc == 2 && $r->a_keuangan == 2 && $r->t_approve == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                        }
                        echo "<td>";
                        if($r->a_ohc == 0 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    // echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/editRequest/'.$r->id_request).">Edit</a>";
                                    // echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                        }elseif ($r->a_ohc == 1 || $r->a_ohc == 2 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                        }
                        $no++; }
                        echo "</tr>";
                        echo "</tbody>";
                    }?>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Users Request Approve (Admin Keuangan)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover DataTable-4" id="" width="100%" cellspacing="0" style="font-size:13px;">
                 <thead class="bg-gray-200">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
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
                        <th>PISA</th>
                        <th>Tgl Pengajuan</th>
                        <th>Ket</th>
                        <td>Status</td>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php $no=1; foreach ($request->result() as $r) { ?>
                    <?php if($r->a_keuangan == 1 || $r->a_keuangan == 2 ){ 
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no;
                        echo "<td>".$r->n_pegawai;
                        echo "<td>".$r->n_pasien;
                        echo "<td>".$r->nik_request;
                        echo "<td>".$r->pisa;
                        echo "<td>".$r->tgl_pengajuan;
                        echo "<td>".$r->ket;
                        echo "<td>";
                        if($r->a_keuangan == 0 && $r->t_approve == 0){ 
                            echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                        }elseif ($r->a_keuangan == 1 ){ 
                            echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                        }elseif ($r->a_keuangan == 2 && $r->a_ohc == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                        }elseif ($r->a_ohc == 2 && $r->a_keuangan == 2 && $r->t_approve == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                        }
                            echo "<td>";
                        if($r->a_keuangan == 0 ){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    // echo "<a class=\"badge badge-sm badge-primary mr-2\"  href=".site_url('request/editRequest/'.$r->id_request).">Edit</a>";
                                    // echo "<a class=\"badge badge-sm badge-danger mr-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" href=\"#\" >Hapus</a>";
                        }elseif ($r->a_keuangan == 1 || $r->a_keuangan == 2){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                        }
                        $no++; }
                        echo "</tr>";
                        echo "</tbody>";
                    }?>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Users Request Not Approve</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover DataTable-4" id="" width="100%" cellspacing="0" style="font-size:13px;">
                 <thead class="bg-gray-200">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Nama Pasien</th>
                        <th>NIK</th>
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
                        <th>PISA</th>
                        <th>Tgl Pengajuan</th>
                        <th>Ket</th>
                        <td>Status</td>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <?php $no=1; foreach ($request->result() as $r) { ?>
                    <?php if($r->t_approve == 1){ 
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>".$no;
                        echo "<td>".$r->n_pegawai;
                        echo "<td>".$r->n_pasien;
                        echo "<td>".$r->nik_request;
                        echo "<td>".$r->pisa;
                        echo "<td>".$r->tgl_pengajuan;
                        echo "<td>".$r->ket;
                        echo "<td>";
                        if($r->a_departement == 2 && $r->a_divisi == 2 && $r->a_ohc == 2 && $r->a_keuangan == 2 && $r->t_approve == 1 ){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                        }elseif ($r->a_departement == 2 && $r->t_approve == 1 || $r->a_divisi == 2 && $r->t_approve == 1 || $r->a_ohc == 2 && $r->t_approve == 1 || $r->a_keuangan == 2 && $r->t_approve == 1){ 
                            echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                        }
                            echo "<td>";
                        if($r->t_approve == 1){ 
                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                        }
                        $no++; }
                        echo "</tr>";
                        echo "</tbody>";
                    }?>
                </table>
           <!--  </div>
        </div>
    </div> -->