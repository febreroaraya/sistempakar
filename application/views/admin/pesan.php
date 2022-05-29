<?php $this->load->view('admin/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><i class="fa fa-table"></i> List Pesan</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tabel Data Pesan</h2>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pesan as $p) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p->nama ?></td>
                                            <td><?= $p->email ?></td>
                                            <td><?= $p->tanggal ?></td>
                                            <td><?= $p->publish ?></td>
                                            <td>
                                                <a href="#lihatpesan<?= $p->id_bukutamu ?>" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Lihat Pesan</a>
                                                <a href="<?= base_url('admin/delete_pesan/' . $p->id_bukutamu) ?>" onclick="return confirm('apakah anda yakin menghapus data?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
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
<?php foreach($pesan2 as $psn) { ?>
<div class="modal fade" id="lihatpesan<?= $psn->id_bukutamu ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Isi Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?= $psn->pesan ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<script>
    <?php if ($this->session->flashdata('berhasil_hapus')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Data pesan berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>
<?php $this->load->view('admin/partials/footer.php') ?>