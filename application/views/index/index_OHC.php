<!-- Custom styles for this template-->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Request Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               <?php
                               $this->db->select('*')->from('t_request')->like('a_ohc', '0' && '1' && '2');
                               echo $this->db->count_all_results();
                               ?>
                           </div>
                       </div>
                       <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Cancel Request Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                           <?php
                                           $this->db->select('*')->from('t_request')->like('t_approve', '1');
                                           echo $this->db->count_all_results();
                                           ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Request Approve Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                           <?php
                                           $this->db->select('*')->from('t_request')->like('a_ohc', '1');
                                           echo $this->db->count_all_results();
                                           ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Main Content 1 -->

            <!-- Begin Page Content 2 -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->
            </div>
            <!-- /.container-fluid -->