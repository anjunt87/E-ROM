 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?= $this->session->flashdata('message'); ?>
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

     <div class="row">
         <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                 <?= validation_errors(); ?>
             </div>
         <?php endif; ?>

         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsubmenuModal">Tambahkan SubMenu</a>
         <table class="table table-bordered table-hover" id="dataTable" style="font-size:14px;">
             <thead class="bg-gray-200">
              <tr>
               <th scope="col">No</th>
               <th scope="col">Title</th>
               <th scope="col">Menu</th>
               <th scope="col">Url</th>
               <th scope="col">Icon</th>
               <th scope="col">Active</th>
               <th scope="col">Action</th>
           </tr>
       </thead>
       <tbody>
          <?php $i = 1; ?>
          <?php foreach ($subMenu as $sm) : ?>
              <tr>
               <th scope="row"><?= $i; ?></th>
               <td><?= $sm['title']; ?></td>
               <td><?= $sm['menu']; ?></td>
               <td><?= $sm['url']; ?></td>
               <td><?= $sm['icon']; ?></td>
               <td><?= $sm['is_active']; ?></td>
               <td>
                 <a class="badge badge-primary" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id'];?>" href="#" >Edit</a>
                <a class="badge badge-danger mr-2" data-toggle="modal" data-target="#hapusSubMenuModal<?= $sm['id'];?>" href="#" >Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Tambah Sub Menu Management Modal -->
<div class="modal fade" id="tambahsubmenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahsubmenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsubmenuModal">Tambahkan Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('menu/subMenuManagement'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Sub Menu</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Judul Sub Menu">
                    </div>

                    <!-- NOTES BUAT KEDEPAN -->
                    <div class="form-group">
                        <label>Tag Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Tag Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Url Menu</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url SubMenu">
                    </div>
                    <div class="form-group">
                        <label>Icon Sub Menu</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon SubMenu">
                    </div>
                    <div class="form-group">
                        <div class="form-check" hidden="">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Sub Menu Management Modal -->
<?php foreach ($subMenu as $d ): ?>
    <div class="modal fade" id="editSubMenuModal<?= $d['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editSub MenuModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSub MenuModal">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('menu/editSubMenuManagement'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul Sub Menu</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Sub Menu" value="<?= $d['title']?>" required="">
                        </div>
                        <div class="form-group">
                             <input type="hidden" name="id" value="<?= $d['id']?>">
                            <label>Tag Menu</label>
                            <select  type="option" class="form-control"  name="menu_id">
                                <option name="menu_id" value="<?= $d['menu_id'];?>"><?= $d['menu'];?></option>
                                <?php foreach($menu as $mn):?>
                                    <option name="menu_id" value="<?= $mn['id'];?>"><?= $mn['menu'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Url Sub Menu</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="URL Sub Menu" value="<?= $d['url']?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Icon Sub Menu</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="ICon Sub Menu" value="<?= $d['icon']?>" required="">
                        </div>
                         <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="<?= $d['is_active'];?>" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>


<!--  Hapus Sub Menu Management Modal -->
<?php foreach ($subMenu as $m ): ?>
    <div class="modal fade" id="hapusSubMenuModal<?= $m['id'];?>" tabindex="-1" role="dialog" aria-labelledby="hapusSubMenuModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Apakah kamu yakin menghapus data ini ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Delete" untuk menghapus data ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= site_url('menu/deleteSubMenu/'.$m['id'])?>">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach ?>
