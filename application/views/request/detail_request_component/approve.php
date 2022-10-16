 <!-- Admin -->
 <?php if($this->session->userdata('role_id')=== '1'):?>
    <a class="btn btn-primary float-right" href="<?= site_url('request/historyRequestApp'); ?>">Kembali</a>   

    <!-- Divisi OHC Approve -->
<?php elseif($this->session->userdata('role_id')=== '2'):?>
 <?php if($request['a_ohc'] == 0 && $request['t_approve'] == 0){ 
    echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
    echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#OhcTolakModal\" href=\"#\" >Tolak</a>";   
    echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#OhcApproveModal\" href=\"#\" >Approve</a>";

}elseif ($request['a_ohc'] == 0 || $request['a_ohc'] == 1 || $request['a_ohc'] == 2 ){ 
   echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
}?>

<!-- Kepala Departement Approve -->
<?php elseif($this->session->userdata('role_id')=== '3'):?>
    <?php if($request['a_departement'] == 0 && $request['t_approve'] == 0){ 
        echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
        echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DepartementTolakModal\" href=\"#\" >Tolak</a>";   
        echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DepartementApproveModal\" href=\"#\" >Approve</a>";
    }elseif ($request['a_departement'] == 0 || $request['a_departement'] == 1 || $request['a_departement'] == 2 ){ 
       echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
   }?>

   <!-- Kepala Divisi Approve -->
<?php elseif($this->session->userdata('role_id')=== '4'):?>
    <?php if($request['a_divisi'] == 0 && $request['t_approve'] == 0){ 
        echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
        echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DivisiTolakModal\" href=\"#\" >Tolak</a>";
        echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#DivisiApproveModal\" href=\"#\" >Approve</a>";
    }elseif ($request['a_divisi'] == 0 || $request['a_divisi'] == 1 || $request['a_divisi'] == 2){ 
       echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
   }?>

   <!-- Divisi Keuangan -->
<?php elseif($this->session->userdata('role_id')=== '5'):?>
    <?php if($request['a_keuangan'] == 0 && $request['t_approve'] == 0){ 
        echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
        echo "<a class=\"btn btn-danger float-right  mr-2\" data-toggle=\"modal\" data-target=\"#KeuanganTolakModal\" href=\"#\" >Tolak</a>";   
        echo "<a class=\"btn btn-success float-right  mr-2\" data-toggle=\"modal\" data-target=\"#KeuanganApproveModal\" href=\"#\" >Approve</a>";

    }elseif ($request['a_keuangan'] == 0 || $request['a_keuangan'] == 1 || $request['a_keuangan'] == 2){ 
       echo "<a class=\"btn btn-primary float-right\"  href=".site_url('request/historyRequestApp').">Kembali</a>";
   }?>

   <!-- Users (Karyawan) -->
<?php elseif($this->session->userdata('role_id')=== '6'):?>
    <a class="btn btn-primary float-right" href="<?= site_url('request/usersRequestHistory'); ?>">Kembali</a>   
    <?php endif?>