<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Request</h1>
        <?php if($this->session->userdata('role_id') === '1' || '2'):?>
            <div class="float-right">
                <a class="btn btn-sm btn-primary shadow-sm" href="<?= site_url('PrintEkspor/printoutRequest/'.$request['id_request'])?> "><i class="fas fa-print fa-sm text-white-50"></i> Print Out Request</a>
                <a class="btn btn-sm btn-primary shadow-sm ml-2"  href="<?= site_url('PrintEkspor/exportPdfRequest/'.$request['id_request'])?>"><i class="fas fa-print fa-sm text-white-50"></i> Ekspor Pdf Request</a>
            </div>
        <?php elseif($this->session->userdata('role_id')=== '3' || '4' || '5' || '6' ):?>
            <div class="float-right">
                <?php if($request['a_ohc'] == 0 ){ 
               // echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                }elseif ($request['a_ohc'] == 1 ){ 
                    echo "<a class=\"btn btn-sm btn-primary shadow-sm\" href=".site_url('PrintEkspor/printoutRequest/'.$request['id_request'])."><i class=\"fas fa-print fa-sm text-white-50\"></i> Print Out Request</a>";
                    echo "<a class=\"btn btn-sm btn-primary shadow-sm ml-2\"  href=".site_url('PrintEkspor/exportPdfRequest/'.$request['id_request'])."><i class=\"fas fa-print fa-sm text-white-50\"></i> Ekspor Pdf Request</a>";
                }?>
            </div>
        <?php endif?>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success">
            <h6 class="m-0 font-weight-bold text-gray-900 text-success ">Approved</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Divisi</th>
                        <th>Departement</th>
                        <th>OHC</th>
                        <th>Keuangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php if($request['a_divisi'] == 0 ){ 
                                echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                            }elseif ($request['a_divisi'] == 1 ){ 
                                echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                            }elseif ($request['a_divisi'] == 2 ){ 
                                echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';}?>
                        </td>
                        <td>
                           <?php if($request['a_departement'] == 0){ 
                                if ($request['a_divisi'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_departement'] == 0 || $request['a_divisi'] == 1) {
                                   echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                }
                            }elseif ($request['a_departement'] == 1 ){ 
                                echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                            }elseif ($request['a_departement'] == 2 || $request['t_approve'] == 1){ 
                                echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';}?>
                        </td>
                        <td>
                            <?php if($request['a_ohc'] == 0){ 
                                if ($request['a_divisi'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                } elseif ($request['a_departement'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_ohc'] == 0 || $request['a_divisi'] == 1 || $request['a_departement'] == 1) {
                                   echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                }
                            }elseif ($request['a_ohc'] == 1 ){ 
                                echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                            }elseif ($request['a_ohc'] == 2 ){ 
                                echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';}?>
                        </td>
                        <td>
                            <?php if($request['a_keuangan'] == 0){ 
                                if ($request['a_divisi'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                } elseif ($request['a_departement'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_ohc'] == 2) {
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_keuangan'] == 0 || $request['a_ohc'] == 1 || $request['a_divisi'] == 1 || $request['a_departement'] == 1) {
                                   echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                }
                            }elseif ($request['a_keuangan'] == 1 ){ 
                                echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                            }elseif ($request['a_keuangan'] == 2 ){ 
                                echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                            }?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($request['a_divisi'] == 2 || $request['a_departement'] == 2 || $request['a_ohc'] == 2 || $request['a_keuangan'] == 2){
      echo '<div class="card shadow mb-4">
      <div class="card-header py-3 bg-danger">
        <h6 class="m-0 font-weight-bold">Keteragan Not Approve</h6>
         </div>
            <div class="card-body">';
              echo $request['t_ket'];
            echo '</div>
        </div>';
     }?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success">
            <h6 class="m-0 font-weight-bold text-gray-900 text-success ">Request Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table width="100%">
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A. Data Diri</td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <thead>
                        <th width="2%"></th>
                        <th width="16%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $request['n_pegawai']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $request['nik_request']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Personal Grade / Jabatan</td>
                            <td>:</td>
                            <td><?= $request['n_jabatan']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>RS</td>
                            <td>:</td>
                            <td><?= $request['rs_dokter']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>PISA</td>
                            <td>:</td>
                            <td><?= $request['pisa']?></td>
                        </tr>
                    </tbody>
                </table>
                <table width="100%">
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>B. Bantuan dimintakan untuk</td>
                        </tr><tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" id="" width="100%" cellspacing="4">
                    <thead>
                        <th>No.</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir Pasien</th>
                        <th>keterangan</th>
                        <th>PISA</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td><?= $request['n_pasien']?></td>
                            <td><?= $request['ttl_pasien']?></td>
                            <td><?= $request['ket']?></td>
                            <td><?= $request['pisa']?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C. Diagnosa Sakit</td>
                            <td>:</td>
                            <td><?= $request['d_sakit']?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>D. Kronologi</td>
                            <td>:</td>
                            <td><?= $request['kronologi']?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E. Bukti - bukti yang dilampirkan</td>
                            <td>:</td>
                            <td>Terlampir</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" id="" width="100%" cellspacing="4">
                    <thead>
                        <th>No.</th>
                        <th>Kuitansi resep</th>
                        <th>PISA</th>
                        <th>Tanggal Kuitansi</th>
                        <th>Uraian</th>
                        <th>Nominal</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td><?= $request['kuitansi']?></td>
                            <td><?= $request['pisa']?></td>
                            <td><?= $request['tgl_kuitansi']?></td>
                            <td><?= $request['u_berobat']?></td>
                            <td><?= $request['nominal']?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total Pengajuan</td>
                            <td><?= $request['t_pengajuan']?></td>
                        </tr>
                    </tfoot>
                </table>
                <table style="margin-left:2%;" id="" width="95%">
                    <tr>
                        <td width="40%" style="text-align: center;">Memengetahui dan Menyetujui,</td>
                        <td width="30%"></td>
                        <td style="text-align: center;">Jakarta, <?= $request['tgl_pengajuan']?></td>
                    </tr>
                </table>
                <table style="margin-left:2%;" class="" id="" width="95%">
                    <tr>
                        <td width="40%" style="text-align: center;">Kepada Divisi <?= $request['n_divisi']?></td>
                        <td width="30%"></td>
                        <td style="text-align: center;">Pemohon,</td>
                        <td></td>
                    </tr>
                </table>
                <table style="margin-left:2%;" class="" id="" width="95%">
                    <tr>
                        <td width="40%" style="text-align: center;"><span><img src="<?= base_url('assets/'); ?>img/qrcode/QRcode.jpg" alt="logo" width="100"></span></td>
                        <td width="30%"></td>
                        <td style="text-align: center;"><span><img src="<?= base_url('assets/'); ?>img/qrcode/QRcode.jpg" alt="logo" width="100"></span></td>
                        <td></td>
                    </tr>
                </table>
                <table style="margin-left:2%;" class="" id="" width="95%">
                    <tr>
                        <td width="40%" style="text-align: center; font-weight: bold; text-decoration: underline;"><?= $request['n_lengkap']?></td>
                        <td width="30%"></td>
                        <td style="text-align: center; font-weight: bold; text-decoration: underline;"><?= $request['n_pegawai']?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="40%" style="text-align: center;">NIK. <?= $request['nik_profile']?>5</td>
                        <td width="30%"></td>
                        <td style="text-align: center; ">NIK. <?= $request['nik_request']?></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-success">
            <h6 class="m-0 font-weight-bold text-gray-900 text-success ">Lampiran</h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Lampiran 1 :</th>
                        <th>Lampiran 2 :</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php if($request['bukti1'] == ''){ ?>
                                <img src="<?= base_url('assets/'); ?>img/lampiran/no-image.jpg" class="" data-lity>
                            <?php } else { ?>
                                <img style="height: 200px; width: 200px;" src="<?php echo base_url('assets/').'img/lampiran/'.$request['bukti1']  ?>" class="" data-lity>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($request['bukti2'] == ''){ ?>
                                <img src="<?= base_url('assets/'); ?>img/lampiran/no-image.jpg" class="" data-lity>
                            <?php } else { ?>
                                <img style="height: 200px; width: 200px;" src="<?php echo base_url('assets/').'img/lampiran/'.$request['bukti2']  ?>" class="" data-lity>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Admin -->
            <?php if($this->session->userdata('role_id')=== '1'):?>
                <a class="btn btn-primary float-right" href="<?= site_url('request/historyRequestApp'); ?>">Kembali</a>   
                
                <!-- Divisi OHC Approve -->
            <?php elseif($this->session->userdata('role_id')=== '2'):?>
                 <?php if($request['a_ohc'] == 0 ){ 
                    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                    echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#OhcTolakModal\" href=\"#\" >Tolak</a>";   
                    echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#OhcApproveModal\" href=\"#\" >Approve</a>";

                }elseif ($request['a_ohc'] == 1 || $request['a_ohc'] == 2 ){ 
                   echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                }?>

                <!-- Kepala Departement Approve -->
            <?php elseif($this->session->userdata('role_id')=== '3'):?>
                <?php if($request['a_departement'] == 0 ){ 
                    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                    echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DepartementTolakModal\" href=\"#\" >Tolak</a>";   
                    echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DepartementApproveModal\" href=\"#\" >Approve</a>";
                }elseif ($request['a_departement'] == 1 || $request['a_departement'] == 2 ){ 
                   echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                }?>

                <!-- Kepala Divisi Approve -->
            <?php elseif($this->session->userdata('role_id')=== '4'):?>
                <?php if($request['a_divisi'] == 0 ){ 
                    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                    echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DivisiTolakModal\" href=\"#\" >Tolak</a>";
                    echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DivisiApproveModal\" href=\"#\" >Approve</a>";
                }elseif ($request['a_divisi'] == 1 || $request['a_divisi'] == 2){ 
                   echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                }?>
               
                <!-- Divisi Keuangan -->
            <?php elseif($this->session->userdata('role_id')=== '5'):?>
                <?php if($request['a_keuangan'] == 0 ){ 
                    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                    echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#KeuangaTolakModal\" href=\"#\" >Tolak</a>";   
                    echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#KeuanganApproveModal\" href=\"#\" >Approve</a>";

                }elseif ($request['a_keuangan'] == 1 || $request['a_keuangan'] == 2 ){ 
                   echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                }?>

                <!-- Users (Karyawan) -->
            <?php elseif($this->session->userdata('role_id')=== '6'):?>
                <a class="btn btn-primary float-right" href="<?= site_url('request/usersRequestHistory'); ?>">Kembali</a>   
            <?php endif?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Approve Divisi -->
<div class="modal fade" id="DivisiApproveModal" tabindex="-1" role="dialog" aria-labelledby="DivisiApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedDivisi/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve Departement -->
<div class="modal fade" id="DepartementApproveModal" tabindex="-1" role="dialog" aria-labelledby="DepartementApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedDepartement/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve OHC -->
<div class="modal fade" id="OhcApproveModal" tabindex="-1" role="dialog" aria-labelledby="OhcApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedOhc/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve Keuangan -->
<div class="modal fade" id="KeuanganApproveModal" tabindex="-1" role="dialog" aria-labelledby="KeuanganApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedKeuangan/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal Tolak Divisi -->
<div class="modal fade" id="DivisiTolakModal" tabindex="-1" role="dialog" aria-labelledby="DivisiTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakDivisi');?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                            <label>Keterangan (Alasan) :</label>
                            <textarea class="form-control" type="text" name="t_ket"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Tolak Departement -->
<div class="modal fade" id="DepartementTolakModal" tabindex="-1" role="dialog" aria-labelledby="DepartementTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakDepartement');?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                            <label>Keterangan (Alasan) :</label>
                            <textarea class="form-control" type="text" name="t_ket"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Tolak OHC -->
<div class="modal fade" id="OhcTolakModal" tabindex="-1" role="dialog" aria-labelledby="OhcTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakOhc');?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                            <label>Keterangan (Alasan) :</label>
                            <textarea class="form-control" type="text" name="t_ket"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Tolak Keuangan -->
<div class="modal fade" id="KeuanganTolakModal" tabindex="-1" role="dialog" aria-labelledby="KeuanganTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakKeuangan');?>" method="post">
                        <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                            <label>Keterangan (Alasan) :</label>
                            <textarea class="form-control" type="text" name="t_ket"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>