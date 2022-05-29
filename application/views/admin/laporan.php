<?php $this->load->view('admin/partials/header.php') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Laporan Diagnosa</h3>
        </div>
    </div>
    <div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Laporan Perpriode</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form class="form-horizontal form-label-left" method="post" action="<?= base_url('admin/pdf_laporan') ?>">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Awal</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="date" name="tgl_awal" required class="form-control" placeholder="Tanggal Awal...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal Akhir</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="date" class="form-control" required name="tgl_akhir" placeholder="Tanggal Akhir...">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="submit" class="btn btn-success"><i class="fa fa-spinner"></i> Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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