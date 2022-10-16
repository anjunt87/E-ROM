<!-- Begin Page Content --> 
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Forms Request</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"><?=$page;?> Request Claim Reimbursement of Medical </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php echo form_open_multipart('request/process')?>
                    <!-- cardbody input A dan B -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">A. Data Diri : </label>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $row->id_request?>">
                                    <label for="exampleInputPassword1">Nama Pegawai</label>
                                    <input type="hidden" class="form-control" name="n_pegawai" placeholder="Nama" value="<?= $record['n_lengkap'];?>" required>
                                    <input type="text" class="form-control" name="" placeholder="NIK" value="<?= $record['n_lengkap'];?>" disabled required>
                                </div>
                                <div class="form-group ">
                                    <label for="nik_request">NIK</label>
                                    <input type="hidden" class="form-control" name="nik_request" placeholder="NIK" value="<?= $record['nik_profile'];?>" required>
                                    <input type="text" class="form-control" name="" placeholder="NIK" value="<?= $record['nik_profile'];?>" disabled required>
                                </div>
                                <div class="form-group ">
                                    <label for="pergrade">Personal grade / Jabatan</label>
                                    <input type="hidden" class="form-control" name="id_jabatan" placeholder="Jabatan" value="<?= $record['jabatan_id'];?>" required>
                                    <input type="text" class="form-control" name="" placeholder="Jabatan" value="<?= $record['jabatan_id'];?>" disabled required>
                                </div>
                                <div class="form-group ">
                                    <label for="nki">No. Kartu Inhealt</label>
                                    <input type="text" class="form-control" name="k_healt" placeholder="No. Kartu Inhealt" value="<?=$row->k_healt?>" required>
                                </div>
                                <div class="form-group ">
                                    <label for="rs">Dokter / RS yang merawat</label>
                                    <input type="text" class="form-control" name="rs_dokter" placeholder="Dokter / RS yang merawat" value="<?=$row->rs_dokter?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="bantuan">B. Bantuan diminta untuk : </label>
                                <div class="form-group">
                                    <label for="n_pasien">Nama Pasien</label>
                                    <input type="text" id="n_pasien" class="form-control" name="n_pasien" placeholder="Nama Pasien" value="<?=$row->n_pasien?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir Pasien</label>
                                    <input type="date" id="datepicker" class="form-control" name="ttl_pasien" value="<?=$row->ttl_pasien?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <input type="text" class="form-control" name="ket" placeholder="Keterangan" value="<?=$row->ket?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="ket">PISA</label>
                                    <input type="text" class="form-control" name="pisa" placeholder="PISA" value="<?=$row->pisa?>" required>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->

                    <!-- Card body input C dan D -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">C. Diagnosa Sakit : </label>
                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea  type="text" class="form-control" name="d_sakit" placeholder="Diagnosa Sakit" value="" required><?=$row->d_sakit?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">D. Kronologi : </label>
                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea  type="text" class="form-control" name="kronologi" placeholder="Kronologi" value="" required><?=$row->kronologi?></textarea>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->

                    <!-- Card body input E -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="exampleInputPassword1">E. Bukti - Bukti yang dilampirkan : </label>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kuitansi / Resep</label>
                                    <input type="text" class="form-control" name="kuitansi" placeholder="Kuitansi / Resep" value="<?=$row->kuitansi?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_kuitansi">Tanggal Kuitansi / Resep / dll</label>
                                    <input type="date" id="datepicker" class="form-control" name="tgl_kuitansi" value="<?=$row->tgl_kuitansi?>" required=>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Uraian Berobat</label>
                                    <input type="text" class="form-control" name="u_berobat" placeholder="Uraian Berobat" value="<?=$row->u_berobat?>"  required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nominal</label>
                                    <input type="number" class="form-control" name="nominal" placeholder="Nominal" value="<?=$row->nominal?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="tgl_pengajuan"  value="<?= date('Y-m-d'); ?>" required>
                                </div>

                                <!-- Kepala Divisi -->
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="kep_divisi"  value="" required>
                                </div>

                                
                                <!-- id Query Harus ada valuenya -->
                                <input type="hidden" name="id_departement" value="<?= $record['departement_id'];?>">
                                <input type="hidden" name="id_divisi" value="<?= $record['divisi_id'];?>">
                                <input type="hidden" name="id_korwil" value="<?= $record['korwil_id'];?>">
                                <input type="hidden" name="id_cabang" value="<?= $record['cabang_id'];?>">
                                <input type="hidden" name="id_unit" value="<?= $record['cabang_unit_id'];?>">
                                <input type="hidden" name="id_atasan" value="<?= $user['atasan_id'];?>">
                                
                                <!-- Upload -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bukti Kuitansi / Resep / dll</label>
                                </div>
                                <!-- HIDDEN DYNAMIC ELEMENT TO CLONE -->
                                <!-- you can replace it with any other elements -->
                                <div class="form-group dynamic-element" style="display:none">
                                  <div class="row">
                                      <div class=""></div>

                                      <!-- Replace these fields -->
                                      <div class="col-md-4 mt-4">
                                        <input type="file" id="image" name="image[]" class="form-control">
                                    </div>
                                    <!-- End of fields-->
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger btn-del" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <!-- END OF HIDDEN ELEMENT -->

                            <div class="dynamic-stuff">
                                <!-- Dynamic element will be cloned here -->
                                <!-- You can call clone function once if you want it to show it a first element-->
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="">
                                      <p class="add-one">+ Tambah Form Upload</p>
                                  </div>
                              </div>
                          </div><!-- End Upload -->
                      </div>
                  </div><!-- /.card-body -->
                  <div class="form-group mt-4">
                    <button type="reset" name="reset" class="btn btn-danger float-right ml-2">Reset</button>
                    <button type="submit" name="<?= $page?>" class="btn btn-success float-right">Simpan</button>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->