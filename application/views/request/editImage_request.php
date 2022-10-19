<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <?= $this->session->flashdata('message'); ?>
  <h1 class="h3 mb-2 text-gray-800">Forms Edit</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success"> Forms Edit Image Request </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!-- cardbody input A dan B -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <?php foreach ($lampiran as $l){ ?>
                <label for="exampleInputPassword1">Lampiran : </label>
                <div class="form-group">
                  <?php if ($l['n_image'] == null || 0) { ?>
                    <img  src="<?= base_url('assets/')?>/img/lampiran/no-image.jpg" width="200" data-lity>
                  <?php } else { ?>
                    <img  src="<?= base_url('assets/')?>/img/lampiran/<?= $l['n_image']?>" width="200" data-lity>
                  <?php }?>
                </div>
                <div class="form-group">
                  <a class="btn btn-sm btn-primary mr-2"  href="<?= site_url('request/form_edit_image/'.$l['id_image'])?>"> <i class="fas fa-edit"></i> Edit Image</a>
                </div> 
                <hr> 
              <?php }?>
            </div><!-- /.card-body -->
          </div>
          <a class="btn btn-sm btn-danger mr-2 float-right"  href="<?= site_url('request/usersRequestHistory')?>"> Kembali</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid --> 

