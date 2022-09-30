<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Request</h1>
                        <!-- Admin -->
                        <?php if($this->session->userdata('role_id')=== '1'):?>
                            <?php $this->load->view('request/admin/request_approve_admin');?>
                        <!-- Divisi OHC Approve -->
                        <?php elseif($this->session->userdata('role_id')=== '2'):?>
                            <?php $this->load->view('request/admin_ohc/request_approve_ohc');?>
                        <!-- Kepala Departement Approve -->
                        <?php elseif($this->session->userdata('role_id')=== '3'):?>
                            <?php $this->load->view('request/departement/request_approve_departement');?>
                        <!-- Kepala Divisi Approve -->
                        <?php elseif($this->session->userdata('role_id')=== '4'):?>
                            <?php $this->load->view('request/divisi/request_approve_divisi');?>
                        <!-- Divisi Keuangan Approve -->
                        <?php elseif($this->session->userdata('role_id')=== '5'):?>
                            <?php $this->load->view('request/keuangan/request_approve_keuangan');?>
                        <?php endif?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    $(document).ready(function () {
        $('table.DataTable-1').DataTable();
    });
    $(document).ready(function () {
        $('table.DataTable-2').DataTable();
    });
    $(document).ready(function () {
        $('table.DataTable-3').DataTable();
    });
    $(document).ready(function () {
        $('table.DataTable-4').DataTable();
    });
</script>    