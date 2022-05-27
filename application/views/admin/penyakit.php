<?php $this->load->view('admin/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-table"></i> List Penyakit</h3>
            <a href="#addpenyakit" data-toggle="modal" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Penyakit</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Penyakit</h2>
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
                                        <th>Nama Penyakit</th>
                                        <th>Pencegahan</th>
                                        <th>Pengobatan</th>
                                        <th>Np Populasi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($penyakit as $p) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->kd_penyakit ?></td>
                                            <td><?= $p->nm_penyakit ?></td>
                                            <td><?= $p->pencegahan ?></td>
                                            <td><?= $p->pengobatan ?></td>
                                            <td><?= $p->np_populasi ?></td>
                                            <td>
                                                <a href="#editpenyakit<?= $p->kd_penyakit ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('admin/delete_penyakit/' . $p->kd_penyakit) ?>" onclick="return confirm('apakah anda yakin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="addpenyakit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="<?= base_url('admin/save_penyakit') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kode Penyakit</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="kd_penyakit" placeholder="Kode Penyakit..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Penyakit</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="nm_penyakit" placeholder="Nama Penyakit..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Pencegahan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="pencegahan" placeholder="Pencegahan...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Pengobatan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="pengobatan" placeholder="Pengobatan...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Np Populasi</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="np_populasi" placeholder="Np Populasi...">
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
<?php foreach ($penyakit2 as $pn) { ?>
    <div class="modal fade" id="editpenyakit<?= $pn->kd_penyakit ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="<?= base_url('admin/update_penyakit') ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Penyakit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Kode Penyakit</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="kd_penyakit" readonly value="<?= $pn->kd_penyakit ?>" placeholder="Kode Penyakit..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Penyakit</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nm_penyakit" value="<?= $pn->nm_penyakit ?>" placeholder="Nama Penyakit..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pencegahan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="pencegahan" value="<?= $pn->pencegahan ?>" placeholder="Pencegahan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pengobatan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="pengobatan" value="<?= $pn->pengobatan ?>" placeholder="Pengobatan...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Np Populasi</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="np_populasi" value="<?= $pn->np_populasi ?>" placeholder="Np Populasi...">
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
            title: 'Data penyakit berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data penyakit berhasil diupdate/diubah',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_hapus')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data penyakit berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('admin/partials/footer.php') ?>