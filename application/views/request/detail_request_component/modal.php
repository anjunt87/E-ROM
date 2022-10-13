<!-- Modal Approve Divisi -->
<div class="modal fade" id="DivisiApproveModal" tabindex="-1" role="dialog" aria-labelledby="DivisiApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedDivisi/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve Departement -->
<div class="modal fade" id="DepartementApproveModal" tabindex="-1" role="dialog" aria-labelledby="DepartementApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedDepartement/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve OHC -->
<div class="modal fade" id="OhcApproveModal" tabindex="-1" role="dialog" aria-labelledby="OhcApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedOhc/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Approve Keuangan -->
<div class="modal fade" id="KeuanganApproveModal" tabindex="-1" role="dialog" aria-labelledby="KeuanganApproveModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Apakah kamu yakin Approve Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="">
                <div class="modal-footer">
                    <a class="btn btn-success float-right  mr-2" href="<?= site_url('request/requestApprovedKeuangan/'.$request['id_request'])?>">Approve</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal Tolak Divisi -->
<div class="modal fade" id="DivisiTolakModal" tabindex="-1" role="dialog" aria-labelledby="DivisiTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakDivisi');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                                <label>Keterangan (Alasan) :</label>
                                <textarea class="form-control" type="text" name="t_ket"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- Modal Tolak Departement -->
<div class="modal fade" id="DepartementTolakModal" tabindex="-1" role="dialog" aria-labelledby="DepartementTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakDepartement');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                                <label>Keterangan (Alasan) :</label>
                                <textarea class="form-control" type="text" name="t_ket"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- Modal Tolak OHC -->
<div class="modal fade" id="OhcTolakModal" tabindex="-1" role="dialog" aria-labelledby="OhcTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakOhc');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                                <label>Keterangan (Alasan) :</label>
                                <textarea class="form-control" type="text" name="t_ket"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- Modal Tolak Keuangan -->
<div class="modal fade" id="KeuanganTolakModal" tabindex="-1" role="dialog" aria-labelledby="KeuanganTolakModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Apakah kamu yakin Tolak Request ini ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= site_url('request/requestTolakKeuangan');?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id_request" value="<?= $request['id_request']?>">
                                <label>Keterangan (Alasan) :</label>
                                <textarea class="form-control" type="text" name="t_ket"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" name="submit"class="btn btn-danger">Tolak</button>
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>