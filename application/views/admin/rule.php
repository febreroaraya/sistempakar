<?php $this->load->view('admin/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-table"></i> List Rule</h3>
            <a href="#addrule" data-toggle="modal" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Rule</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Rule</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Penyakit</th>
                                        <th>Nama Penyakkit</th>
                                        <th>Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th>Nilai Probabilitas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rule as $r) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r->kd_penyakit ?></td>
                                            <td><?= $r->nm_penyakit ?></td>
                                            <td><?= $r->kd_gejala ?></td>
                                            <td><?= $r->nm_gejala ?></td>
                                            <td><?= $r->nilai_probabilitas ?></td>
                                            <td>
                                                <a href="#editpenyakit<?= $r->id_aturan ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('admin/delete_rule/' . $r->id_aturan) ?>" onclick="return confirm('apakah anda yakin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addrule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="<?= base_url('admin/save_rule') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Penyakit</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="kd_penyakit" class="form-control">
                                <option>--Pilih--</option>
                                <?php foreach ($penyakit as $p) { ?>
                                    <option value="<?= $p->kd_penyakit ?>"><?= $p->nm_penyakit ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Gejala</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="kd_gejala" class="form-control">
                                <option>--Pilih--</option>
                                <?php foreach ($gejala as $g) { ?>
                                    <option value="<?= $g->kd_gejala ?>"><?= $g->nm_gejala ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nilai Probabilitas</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="nilai_probabilitas" placeholder="Nilai Probabilitas..." required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php foreach ($rule2 as $rl) { ?>
    <div class="modal fade" id="editpenyakit<?= $rl->id_aturan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="<?= base_url('admin/update_rule') ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Penyakit</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kd_penyakit" class="form-control">
                                    <option>--Pilih--</option>
                                    <?php foreach ($penyakit as $p) { ?>
                                        <option <?php if ($rl->kd_penyakit == $p->kd_penyakit)
                                                    echo "selected=\"selected\"";
                                                ?> value="<?= $p->kd_penyakit ?>"><?= $p->nm_penyakit ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="id_aturan" value="<?= $rl->id_aturan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Gejala</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kd_gejala" class="form-control">
                                    <option>--Pilih--</option>
                                    <?php foreach ($gejala as $g) { ?>
                                        <option <?php if ($rl->kd_gejala == $g->kd_gejala)
                                                    echo "selected=\"selected\"";
                                                ?> value="<?= $g->kd_gejala ?>"><?= $g->nm_gejala ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nilai Probabilitas</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nilai_probabilitas" value="<?= $rl->nilai_probabilitas ?>" placeholder="Nilai Probabilitas..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
<script>
    <?php if ($this->session->flashdata('berhasil')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data rule berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data rule berhasil diupdate/diubah',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_hapus')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data rule berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('admin/partials/footer.php') ?>