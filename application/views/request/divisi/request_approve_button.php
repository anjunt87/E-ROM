 <?php if($request['a_divisi'] == 0 ){ 
    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
                    // echo "<a class=\"btn btn-danger float-right mr-2\" href=".site_url(''.$request['id_request']).">Tolak</a>";
    echo  "<a class=\"btn btn-success float-right  mr-2\" href=".site_url('request/requestApprovedDivisi/'.$request['id_request']).">Approve</a>";
 }elseif ($request['a_divisi'] == 1 ){ 
  echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
}?>

