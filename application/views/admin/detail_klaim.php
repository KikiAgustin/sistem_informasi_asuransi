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
                    <h6 class="m-0 font-weight-bold text-primary">Klaim Asuransi Untuk <?= $anggota['nama']; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal Klaim</th>
                                    <th>Usia</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($klaim as $value) : ?>
                                    <tr>
                                        <td><?= date('d-m-Y', strtotime($value['tanggal'])); ?></td>
                                        <td><?= $value['usia']; ?></td>
                                        <?php if ($value['status'] == 1) : ?>
                                            <td><button class="btn btn-warning">Menunggu</button></td>
                                        <?php elseif ($value['status'] == 2) : ?>
                                            <td><button class="btn btn-success">Selesai</button></td>
                                        <?php elseif ($value['status'] == 3) : ?>
                                            <td><button class="btn btn-danger">Ditolak</button></td>
                                        <?php endif; ?>
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