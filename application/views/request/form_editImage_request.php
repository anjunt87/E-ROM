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
                                      <button href="#" data-toggle="modal" data-target="#editImageModal<?= $l['id_image'];?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"> Edit Image</i></button>
                                   </div> 
                                   <hr> 
                                <?php }?>
                            </div><!-- /.card-body -->
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid --> 

    <!-- Edit Departement Modal -->
    <?php foreach ($lampiran as $l ): ?>
        <div class="modal fade" id="editImageModal<?= $l['id_image'];?>" tabindex="-1" role="dialog" role="dialog" aria-labelledby="editImageModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editDepartementModal">Edit Image Lampiran Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form class="form-horizontal" id="submit" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" name="id_image1" value="<?= $l['id_image'];?>">
                    <input type="file" name="file" id="file2" accept="image/png, image/jpeg, image/jpg, image/gif"  onchange="preview()">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <img id="frame" src="" class="img-fluid" />
                  </div>
              </div>
              <div class="form-group">
                <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
            </div>
        </div>
    </form> 
</div>
</div>
</div>
<?php endforeach ?>

<script>
  function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
  }
  function clearImage() {
    document.getElementById('file2').value = null;
    frame.src = "";
  }
</script>
<!-- <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.js" ></script> -->
<script src="<?= base_url('assets/')?>js/jquery-3.2.1.js" ></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#submit').submit(function(e){
      e.preventDefault(); 
      $.ajax({
        url:'<?php echo base_url();?>index.php/request/editImageLampiran',
        type:"post",
                 data:new FormData(this), //this is formData
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                 success: function(data){
                  document.location.href = "<?= site_url('request/edit_image/'.$l['request_id']); ?>";
              }
          });
  });
});
</script>
