<table class="table">
    <thead>
        <tr>
            <?php
            $data = $request['id_request'];
            $this->db->select('*')->from('t_image')->like('request_id',  $data);
            $hitung = $this->db->count_all_results();
            if ($hitung == 1) {
                echo "<th>Lampiran 1 :</th>";
            }elseif($hitung == 2){
                echo "<th>Lampiran 1 :</th>
                <th>Lampiran 2 :</th>";
            }elseif($hitung == 3 ){
                echo "<th>Lampiran 1 :</th>
                <th>Lampiran 2 :</th>
                <th>Lampiran 3 :</th>";
            }elseif($hitung == 4){
                echo "<th>Lampiran 1 :</th>
                <th>Lampiran 2 :</th>
                <th>Lampiran 3 :</th>
                <th>Lampiran 4 :</th>";
            }elseif($hitung == 5 ){
                echo "<th>Lampiran 1 :</th>
                <th>Lampiran 2 :</th>
                <th>Lampiran 3 :</th>
                <th>Lampiran 4 :</th>
                <th>Lampiran 5 :</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php foreach ($lampiran as $r ) { ?>
                <td>
                    <?php
                    $data = $request['id_request'];
                    ?>
                    <?php if ($r['request_id'] == $data) { 
                        if ($r['n_image'] == null ){
                           echo "<img style=\"height: 200px; width: 200px;\" src=".base_url('assets/').'img/lampiran/no-image.jpg'." data-lity>";
                       }else{
                           echo "<img style=\"height: 200px; width: 200px;\" src=".base_url('assets/').'img/lampiran/'.$r['n_image']." data-lity>";
                       }
                   }
                   ?>
               </td>
           <?php } ?>
       </tr>
   </tbody>
</table>
<!-- Error Jika Data di table Image tidak ada atau empty -->
