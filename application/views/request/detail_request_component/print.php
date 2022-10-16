<!-- Modul Print -->
<?php if($this->session->userdata('role_id') === '1' && '2'):?>
    <div class="justify-content-between mb-4">
        <div class="float-right">
            <a class="btn btn-sm btn-primary shadow-sm" href="<?= site_url('PrintEkspor/printoutRequest/'.$request['id_request'])?> "><i class="fas fa-print fa-sm text-white-50"></i> Print Out Request</a><br><br>
            <a class="btn btn-sm btn-primary shadow-sm"  href="<?= site_url('PrintEkspor/exportPdfRequest/'.$request['id_request'])?>"><i class="fas fa-print fa-sm text-white-50"></i> Ekspor Pdf Request</a>
        </div>
    </div>
    <br>
<?php elseif($this->session->userdata('role_id') === '3' || '4' ||'5' || '6'  ):?>
    <div class="justify-content-between mb-4">
        <div class="float-right">
            <?php if($request['a_ohc'] == 0 ){ 
                                 // echo '<div style="color: gray;"><i class="fas fa-clock"></i> Menunggu</div>';
            }elseif ($request['a_ohc'] == 1 ){ 
                echo "<a class=\"btn btn-sm btn-primary shadow-sm\" href=".site_url('PrintEkspor/printoutRequest/'.$request['id_request'])."><i class=\"fas fa-print fa-sm text-white-50\"></i> Print Out Request</a><br><br>";
                echo "<a class=\"btn btn-sm btn-primary shadow-sm mb-4\"  href=".site_url('PrintEkspor/exportPdfRequest/'.$request['id_request'])."><i class=\"fas fa-print fa-sm text-white-50\"></i> Ekspor Pdf Request</a>";
            }?>
        </div>
    </div>
    <br>
<?php endif?><!-- End Modul Print -->