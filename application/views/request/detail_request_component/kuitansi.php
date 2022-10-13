<!-- Waktu Kuitansi -->
<?php 
    $tgl_kw = new DateTime($request['tgl_kuitansi']);
    $tgl_pengajuan = new DateTime($request['tgl_pengajuan']);
    $jarak =  $tgl_kw->diff($tgl_pengajuan);
    $days = $jarak->days;
    if ($days <= "90") { //jika jarak lebih kecil dari 90
        
    }elseif($days >= "90") { //jika jarak lebih besar dari 90
         if ($request['t_approve'] == 0 ) {
         echo 
            "<body onload=\"setTimeout(function() { document.frm1.submit() },)\">
            <form name=\"frm1\"  method=\"post\" action=".site_url('request/requestTolakKuitansi/'.$request['id_request']).">
            </form>
            </body>";
        }
    }
?><!-- End Waktu Kuitansi -->
