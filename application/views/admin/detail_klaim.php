<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Klaim Asuransi</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pilih Peserta Asuransi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <th>jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Hubungan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($anggota as $value) : ?>

                                    <?php
                                    $tanggal = new DateTime($value['tanggal_lahir']);
                                    $today = new DateTime('today');
                                    $tahun = $today->diff($tanggal)->y;
                                    ?>
                                    <tr>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['jenis_kelamin']; ?></td>
                                        <td><?= $tahun; ?> Tahun</td>
                                        <td><?= $value['status_hubungan']; ?></td>
                                        <td><a href="<?= base_url('Admin/hitungKlaim/') . $value['id_anggota'] . '/' . $value['id_polis']; ?>" class="btn btn-primary" href="">Pilih</a></td>

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