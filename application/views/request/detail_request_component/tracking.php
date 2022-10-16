<!-- Tracking Approve -->
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3 bg-success">
        <h6 class="m-0 font-weight-bold text-gray-900 text-success ">Approved</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Departement</th>
                        <th>Divisi</th>
                        <th>OHC</th>
                        <th>Keuangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php if($request['a_departement'] == 2 && $request['a_divisi'] == 2 && $request['a_ohc'] == 2 && $request['a_keuangan'] == 2 && $request['t_approve'] == 1){
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_departement'] == 0 ){
                                    echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                }elseif ($request['a_departement'] == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                                }elseif ($request['a_departement'] == 2 ){ 
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                                }
                            ?>
                            <?= $request['w_departement']?>
                        </td>
                        <td>
                           <?php if($request['a_departement'] == 2 && $request['a_divisi'] == 2 && $request['a_ohc'] == 2 && $request['a_keuangan'] == 2 && $request['t_approve'] == 1){
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_divisi'] == 0) {
                                   if ($request['a_departement'] == 2) {
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    }elseif ($request['a_divisi'] == 0 || $request['a_departement'] == 1) {
                                       echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                    }
                                }elseif ($request['a_divisi'] == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                                }elseif ($request['a_divisi'] == 2 || $request['t_approve'] == 1){ 
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                            }?>
                            <?= $request['w_divisi']?>
                        </td>
                        <td>
                            <?php if($request['a_departement'] == 2 && $request['a_divisi'] == 2 && $request['a_ohc'] == 2 && $request['a_keuangan'] == 2 && $request['t_approve'] == 1){
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_ohc'] == 0) {
                                    if ($request['a_divisi'] == 2) {
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    } elseif ($request['a_departement'] == 2){
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    }elseif ($request['a_ohc'] == 0 || $request['a_divisi'] == 1 || $request['a_departement'] == 1){
                                        echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                    }
                                }
                                elseif ($request['a_ohc'] == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                                }elseif ($request['a_ohc'] == 2 ){ 
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                            }?>
                            <?= $request['w_ohc']?>
                        </td>
                        <td>
                            <?php if($request['a_departement'] == 2 && $request['a_divisi'] == 2 && $request['a_ohc'] == 2 && $request['a_keuangan'] == 2 && $request['t_approve'] == 1){
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                }elseif ($request['a_keuangan'] == 0) {
                                    if ($request['a_divisi'] == 2) {
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    } elseif ($request['a_departement'] == 2) {
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    }elseif ($request['a_ohc'] == 2) {
                                        echo '<div style="color: red;"><i class="fas fa-window-close"></i> Cancel Request</div>';
                                    }elseif ($request['a_keuangan'] == 0 || $request['a_ohc'] == 1 || $request['a_divisi'] == 1 || $request['a_departement'] == 1) {
                                       echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
                                   }
                                }
                                elseif ($request['a_keuangan'] == 1 ){ 
                                    echo '<div style="color: green;"><i class="fas fa-check"></i> Approve</div>';
                                }elseif ($request['a_keuangan'] == 2 ){ 
                                    echo '<div style="color: red;"><i class="fas fa-window-close"></i> Not Approve</div>';
                            }?>
                            <?= $request['w_keuangan']?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Not Approve -->
            <?php if($request['a_departement'] == 2 && $request['a_divisi'] == 2 && $request['a_ohc'] == 2 && $request['a_keuangan'] == 2 && $request['t_approve'] == 1){
                echo '<div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold">Keteragan Cancel Request</h6>
                        </div>
                     <div class="card-body">';
                echo $request['t_ket']; 
                echo "<br>";
                echo "Tanggal Kuitansi Anda "; 
                $sampeledate = ($request['tgl_kuitansi']); 
                $converdate = format_indo(date('Y-m-d', strtotime($sampeledate)));
                echo $converdate;

                echo "<br>";
                echo "Tanggal Pengajuan Anda "; 
                $sampeledate2 = ($request['tgl_pengajuan']); 
                $converdate2 = format_indo(date('Y-m-d', strtotime($sampeledate2)));
                echo $converdate2;
                echo '</div></div>';
            }elseif($request['a_divisi'] == 2 || $request['a_departement'] == 2 || $request['a_ohc'] == 2 || $request['a_keuangan'] == 2 ) {
                 echo '<div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold">Keteragan Not Approve</h6>
                        </div>
                     <div class="card-body">';
                echo $request['t_ket'];
                echo '</div></div>';
            }
        ?><!-- End Not Approve -->
      </div>
  </div>
</div> <!-- End Tracking Approve -->

