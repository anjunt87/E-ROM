<style type="text/css">
.page-break{
    page-break-before: always;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card-body">
        <div class="table-responsive">
            <table width="100%">
                <thead>
                    <tr>
                        <th>SURAT PERMOHONAN</th>
                    </tr>
                    <tr>
                        <th>BANTUAN BIAYA PENGOBATAN / KACAMATA KARYAWAN PT. PEGADAIAN</th>
                    </tr>
                </thead>
            </table>
            <hr>
        </div>
        <div class="table-responsive">

            <!-- Table A -->
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="2%">A.</td>
                        <td width="31%">Data Diri </td>
                        <td width="3%">:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="3%"></th>
                        <th width="31%"></th>
                        <th width="3%"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <td></td>
                       <td>Nama</td>
                       <td>:</td>
                       <td><?= $record['n_pegawai']?></td>
                   </tr>
                   <tr>
                    <td></td>
                    <td>NIK</td>
                    <td>:</td>
                    <td><?= $record['nik_request']?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Personal Grade</td>
                    <td>:</td>
                    <td><?= $record['n_jabatan']?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>RS</td>
                    <td>:</td>
                    <td><?= $record['rs_dokter']?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>PISA</td>
                    <td>:</td>
                    <td><?= $record['pisa']?></td>
                </tr>
            </tbody>
        </table><!-- Table A -->
    </div>

    <!-- Table B -->
    <div class="table-responsive">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="2%">B.</td>
                    <td width="31%">Bantuan dimintakan untuk</td>
                    <td width="3%">:</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive" style="margin-left: 2%;">
        <table id="" width="95%" border="1">
            <thead style="background: lightgray;">
                <tr>
                   <th>No.</th>
                   <th>Nama Pasien</th>
                   <th>Tanggal Lahir</th>
                   <th>keterangan</th>
                   <th>PISA</th>
               </tr>
           </thead>
           <tbody style="text-align: center;">
            <tr>
                <td>1.</td>
                <td><?= $record['n_pasien']?></td>
                <td><?= $record['ttl_pasien']?></td>
                <td><?= $record['ket']?></td>
                <td><?= $record['pisa']?></td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Tabke C D -->
<table class="" width="100%">
    <tbody>
        <tr>
            <td width="2%">C.</td>
            <td width="30%">Diagnosa Sakit</td>
            <td width="3%">:</td>
            <td><?= $record['d_sakit']?></td>
        </tr>
    </tbody>
</table>
<table class="" width="100%">
    <tbody>
        <tr>
            <td width="2%">D.</td>
            <td width="30%">Kronologi</td>
            <td width="3%">:</td>
            <td><?= $record['kronologi']?></td>
        </tr>
    </tbody>
</table>

<!-- Table E -->
<table class="" width="100%">
    <thead>
        <tr>
            <th width="2%"></th>
            <th width="30%"></th>
            <th width="3%"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>E.</td>
            <td>Bukti - bukti yang dilampirkan</td>
            <td>:</td>
            <td>Terlampir</td>
        </tr>
    </tbody>
</table>

<!-- Table E -->
<div style="margin-left: 2%;">
    <table id="" width="95%" border="1">
        <thead style="background: lightgray;">
            <tr>
                <th>No.</th>
                <th>Kuitansi resep</th>
                <th>PISA</th>
                <th>Tanggal Kuitansi</th>
                <th>Uraian</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <tr>
                <td>1.</td>
                <td><?= $record['kuitansi']?></td>
                <td><?= $record['pisa']?></td>
                <td><?= $record['tgl_kuitansi']?></td>
                <td><?= $record['u_berobat']?></td>
                <td><?= "Rp " . number_format($record['nominal'], 2, ",", ".");?></td>

            </tr>
        </tbody>
        <tfoot style="text-align: center;">
            <tr>
                <td colspan="5" style="font-weight: bold;">Total Pengajuan</td>
                <td><?= "Rp " . number_format($record['t_pengajuan'], 2, ",", ".");?></td>
            </tr>
        </tfoot>
    </table>
</div>
<br>
<br>
<br>
<br>
<table style="margin-left:2%;" id="" width="95%">
    <tr>
        <td width="40%" style="text-align: center;">Memengetahui dan Menyetujui,</td>
        <td width="23%"></td>
        <td style="text-align: center;">Jakarta, <?= $record['tgl_pengajuan']?></td>
    </table>
    <table style="margin-left:2%;" class="" id="" width="95%">
        <tr>
            <td width="40%" style="text-align: center;">Kepada Divisi <?= $record['n_divisi']?></td>
            <td width="25%"></td>
            <td style="text-align: center;">Pemohon,</td>
        </tr>
    </table>
    <table style="margin-left:2%;" class="" id="" width="95%">
        <tr>
            <td width="40%" style="text-align: center;"><span><img src="<?= base_url('assets/'); ?>img/qrcode/QRcode.jpg" alt="logo" width="100"></span></td>
            <td width="25%"></td>
            <td style="text-align: center;"><span><img src="<?= base_url('assets/'); ?>img/qrcode/QRcode.jpg" alt="logo" width="100"></span></td>
        </tr>
    </table>
    <table style="margin-left:2%;" class="" id="" width="95%">
        <tr>
            <td width="40%" style="text-align: center; font-weight: bold; text-decoration: underline;"><?= $record['n_lengkap']?></td>
            <td width="25%"></td>
            <td style="text-align: center; font-weight: bold; text-decoration: underline;"><?= $record['n_pegawai']?></td>
        </tr>
        <tr>
            <td width="40%" style="text-align: center;">NIK. <?= $record['nik_profile']?>5</td>
            <td width="25%"></td>
            <td style="text-align: center; " width="40%">NIK. <?= $record['nik_request']?></td>
        </tr>
    </table>
</div>
<!-- Lampiran -->
<?php foreach ($lampiran as $l ) { ?>
    <?php
    $data = $record['id_request'];
    ?>
    <?php if ($l['request_id'] == $data) { 
        if ($l['n_image'] == null ){
         echo "<div class=\"page-break\">
         <table style=\"margin-left:2%;\"  width=\"95%\">
         <tr>
         <td>Lampiran :</td>
         </tr>
         </table>
         <table style=\"margin-left:2%;\" width=\"95%\">
         <tr>
         <td><img style=\"height: 500px; width: 500px;\" src=".base_url('assets/').'img/lampiran/no-image.jpg'." data-lity></div>
         </td>
         </tr>
         </table>
         </div>";
     }else{
         echo "<div class=\"page-break\">
         <table style=\"margin-left:2%;\"  width=\"95%\">
         <tr>
         <td>Lampiran :</td>
         </tr>
         </table>
         <table style=\"margin-left:2%;\" width=\"95%\">
         <tr>
         <td><img style=\"height: 500px; width: 500px;\" src=".base_url('assets/').'img/lampiran/'.$l['n_image']." data-lity></div>
         </td>
         </tr>
         </table>
         </div>";
     }
 }
 ?>
<?php } ?>
</div>
