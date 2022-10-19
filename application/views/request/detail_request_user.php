<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-striped">
        <tr>
            <th class="col-md-4">
                <h1 class="h3 mb-0 text-gray-800 mb-4">Request Details</h1>
                <?php $this->load->view('request/detail_request_component/waktu');?>
            </th>
            <th><?php $this->load->view('request/detail_request_component/print');?></th>
        </tr>
    </table>
    <?php $this->load->view('request/detail_request_component/kuitansi');?>
    <?php $this->load->view('request/detail_request_component/tracking');?>
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
                <table class="mt-4" width="100%">
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
                <table class="mb-4" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="50%"></th>
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
                <table class="mb-4" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="50%"></th>
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
                <table class="mb-4" width="100%">
                    <thead>
                        <th width="18%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E. Bukti yang dilampirkan</td>
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
                            <td><?= "Rp " . number_format($request['nominal'], 2, ",", ".");?></td>
                            <!-- <td><?= $request['nominal']?></td> -->
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total Pengajuan</td>
                            <td><?= "Rp " . number_format($request['t_pengajuan'], 2, ",", ".");?></td>
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
                        <td width="40%" style="text-align: center;">NIK. <?= $request['nik_profile']?></td>
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
            <?php $this->load->view('request/detail_request_component/lampiran');?>
            <?php $this->load->view('request/detail_request_component/approve');?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php $this->load->view('request/detail_request_component/modal');?>
