<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <h5 style="margin-left: 45%; margin-top: 20px; margin-bottom: 30px;">Laporan Hasil Diagnosa</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Penyakit</th>
                    <th scope="col">Tanggal Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan as $l) { ?>
                    <tr>
                        <td><?= $l->nama ?></td>
                        <td><?= $l->jenis_kelamin ?></td>
                        <td><?= $l->usia ?></td>
                        <td><?= $l->alamat ?></td>
                        <td><?= $l->nm_penyakit ?></td>
                        <td><?= $l->tgl_diagnosa ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
window.print() 
</script>
</html>