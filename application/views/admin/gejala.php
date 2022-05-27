<?php $this->load->view('admin/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-table"></i> List Gejala</h3>
            <a href="#addgejala" data-toggle="modal" style="margin-left: 15px; margin-top: 20px;" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Gejala</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Gejala</h2>
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
                                        <th>Kode Gejala</th>
                                        <th>Nama Gejala</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($gejala as $g) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $g->kd_gejala ?></td>
                                            <td><?= $g->nm_gejala ?></td>
                                            <td>
                                                <a href="#editpenyakit<?= $g->kd_gejala ?>" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('admin/delete_gejala/' . $g->kd_gejala) ?>" onclick="return confirm('apakah anda yakin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="addgejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="<?= base_url('admin/save_gejala') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kode Gejala</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="kd_gejala" placeholder="Kode Gejala..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Gejala</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="nm_gejala" placeholder="Nama Gejala..." required>
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
<?php foreach ($gejala2 as $gjl) { ?>
    <div class="modal fade" id="editpenyakit<?= $gjl->kd_gejala ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="<?= base_url('admin/update_gejala') ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Kode Gejala</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="kd_gejala" readonly value="<?= $gjl->kd_gejala ?>" placeholder="Kode Gejala..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Gejala</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="nm_gejala" value="<?= $gjl->nm_gejala ?>" placeholder="Nama Gejala..." required>
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
            title: 'Data gejala berhasil disimpan',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data gejala berhasil diupdate/diubah',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php elseif ($this->session->flashdata('berhasil_hapus')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data gejala berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('admin/partials/footer.php') ?>