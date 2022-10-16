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
                    <!-- <th>Personal Grade / Jabatan</th> -->
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
                    <!-- <th>Personal Grade / Jabatan</th> -->
                    <th>PISA</th>
                    <th>Tgl Pengajuan</th>
                    <th>Ket</th>
                    <td>Status</td>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <?php $no=1; foreach ($request->result() as $r) { ?>
                <?php 
                    $data = $record['departement_id'];
                    $dk = $record['korwil_id']; 
                    $cp = $record['cabang_id'];
                    $ucp = $record['cabang_unit_id'];
                ?>
                <?php if($r->departement_id ===  $data ){ 
                    if($r->korwil_id ===  $dk ){ 
                        if($r->cabang_id ===  $cp ){ 
                            if($r->cabang_unit_id ===  $ucp ){ 
                                if($r->a_departement == 0 && $r->t_approve == 0) 
                                {
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>".$no;
                                    echo "<td>".$r->n_pegawai;
                                    echo "<td>".$r->n_pasien;
                                    echo "<td>".$r->nik_request;
                                    // echo "<td>".$r->jabatan_id;
                                    echo "<td>".$r->pisa;
                                    echo "<td>".$r->tgl_pengajuan;
                                    echo "<td>".$r->ket;
                                    echo "<td>";
                                    if($r->a_departement == 0 && $r->t_approve == 0){ 
                                        echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                    }elseif ($r->a_departement == 1 ){ 
                                        echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';}
                                        echo "<td>";
                                        if($r->a_departement == 0 )
                                        { 
                                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                        }elseif ($r->a_departement == 1 ){ 
                                            echo "<a class=\"badge badge-sm badge-success mr-2\"  href=".site_url('request/detailRequestUser/'.$r->id_request).">Lihat</a>";
                                    }
                                }
                            }
                        }
                    }
                }?>
                <?php $no++; }?>