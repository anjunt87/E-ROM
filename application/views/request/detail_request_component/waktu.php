<!-- Waktu Pengajuan -->
<?php if($request['a_departement'] == 0 || $request['a_departement'] == 1 && $request['a_divisi'] == 0 || $request['a_divisi'] == 1 && $request['a_ohc'] == 0 || $request['a_ohc'] == 1 && $request['a_keuangan'] == 0 || $request['a_keuangan'] == 1){
    echo '<div class="float-right">';
    $tgl_exp = new DateTime($request['tgl_exp']);
    $tgl_now = new DateTime(date('Y-m-d'));
    $jarak = $tgl_exp -> diff($tgl_now);
    if ($tgl_now >=$tgl_exp) {
        $id = $request['id_request'];
        if ($request['a_departement'] == 0 ) {
            echo 
            "<body onload=\"setTimeout(function() { document.frm1.submit() },)\">
            <form name=\"frm1\"  method=\"post\" action=".site_url('request/requestKadaluarsaDepartement/'.$request['id_request']).">
            </form>
            </body>";
        }elseif ($request['a_departement'] == 1 && $request['a_divisi'] == 0) {
            echo 
            "<body onload=\"setTimeout(function() { document.frm1.submit() },)\">
            <form name=\"frm1\"  method=\"post\" action=".site_url('request/requestKadaluarsaDivisi/'.$request['id_request']).">
            </form>
            </body>";
        }elseif ($request['a_divisi'] == 1 && $request['a_ohc'] == 0 ) {
            echo 
            "<body onload=\"setTimeout(function() { document.frm1.submit() },)\">
            <form name=\"frm1\"  method=\"post\" action=".site_url('request/requestKadaluarsaOhc/'.$request['id_request']).">
            </form>
            </body>";
        }elseif ($request['a_ohc'] == 1 && $request['a_keuangan'] == 0) {
            echo 
            "<body onload=\"setTimeout(function() { document.frm1.submit() },)\">
            <form name=\"frm1\"  method=\"post\" action=".site_url('request/requestKadaluarsaKeuangan/'.$request['id_request']).">
            </form>
            </body>";
        }
    }else{
        if ($request['t_approve'] == 0 ) {
            echo "<p class=''> Batas pegajuan sisa $jarak->days hari lagi<p>";
            echo '</div><br><br>';
        }elseif ($request['t_approve'] == 1 ) {
            echo '</div><br><br>';
        }
    }
}?><!-- End Waktu Pengajuan -->